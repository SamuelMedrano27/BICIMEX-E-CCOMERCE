let fileName = window.location.pathname;
let valueName = '';
for (let i = fileName.length - 1; i >= 0; i--) {
  if (fileName[i] !== '/') {
    if (valueName === 'php.') {
      valueName = '';
    }
    valueName += fileName[i];
  } else {
    break;
  }
}
valueName = valueName.split('');
valueName = valueName.reverse();
valueName = valueName.join('');

const carShopHeader = () => {
  $.ajax({
    type: 'POST',
    url: '../api/api-carrito.php?action=mostrar',
    contentType: false,
    processData: false,
    success: (data) => {
      if (data == 'none') return;

      const car = document.getElementById('cant-car'),
        summary = document.getElementById('cant-summary');
      data = JSON.parse(data);
      $('#count-car').html(data.info.count);
      if (data.info.count > 0) {
        car.innerHTML += `<div class="qty">${data.info.count}</div>`;
        summary.innerHTML = `<small id="cant-summary"></small>
            <h5 id="price-subtotal"></h5>`;
      } else {
        car.innerHTML = `<i class="fa fa-shopping-cart"></i>
                    <span>Tu carrito</span>`;
        summary.innerHTML += `<p style="font-size: 18px; font-weight: bold;">Tu carrito esta vacío</p>`;
      }
      if (data.info.total > 0) {
        $('#price-subtotal').html('Total: S/.' + data.info.total);
        $('#price-subtotal').css('font-size', '20px');
        $('#price-subtotal').css('margin-left', '22.5%');
      } else {
        $('#price-subtotal').html('');
      }
      $('#cart-list').html(data.DOMheader);
      $('#buyToTal').html('S/. ' + data.info.total);
      $('#orders').html(data.DOM);
    }
  });
};

const wishShopHeader = () => {
  let idusuario = $('#idusuario').val();
  $.post(
    '../ajax/deseos.php?op=listarUsuario',
    { idusuario: idusuario },
    (data) => {
      try {
        data = JSON.parse(data);
        let wish = document.getElementById('cant-wish');
        if (data[data.length - 1].count > 0) {
          wish.innerHTML += `<div class="qty">${
            data[data.length - 1].count
          }</div>`;
        } else {
          wish.innerHTML = `<i class="fa fa-heart-o"></i>
                    <span>Deseos</span>`;
        }
      } catch (e) {
        console.log(e);
      }
    }
  );
};

const listarIndexAsync = async () => {
  if ($('#listIndex').html() === '') {
    $('#listIndex').html(
      '<div class="d-block" align=center>' +
        '<img src="../public/css/ajax-loader.gif" class="img-responsive" width="50%" height="auto" style="margin: auto;">' +
        '</div>'
    );
  }
  let change = await listarIndex();
  if (change) {
    $('#listIndex').html('');
    $('#listIndex').html(change.data);
  }
};

const listarIndex = () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      type: 'POST',
      url: '../ajax/articulo.php?op=listar',
      contentType: false,
      processData: false,
      error: (e) => {
        console.log(e.responseText);
      },
      success: (data) => {
        data = JSON.parse(data);
        let todo = '';
        for (let i = 0; i < data.length; ++i) {
          todo += data[i];
        }
        resolve({
          data: data
        });
        reject({
          error: data
        });
      }
    });
  });
};

const addCarP = (peticion) => {
  $.ajax({
    type: 'POST',
    url: peticion,
    contentType: false,
    processData: false,
    success: (data) => {
      carShopHeader();
    }
  });
  $('#main-body').css('padding', '0');
};

const addCar = async (articulo) => {
  try {
    let cantidadCar = $('#' + 'value' + articulo).val();
    let cantidad = await confirmPeticionCar();
    let confirm = await addPeticion(articulo, cantidad.result, cantidadCar);
    if (confirm.result === 'SI') {
      $.post(
        `../api/api-carrito.php?action=addTheNumber&id=${articulo}&cantidad=${cantidad.result}`,
        (e) => {
          bootbox.alert(e);
          if (valueName === 'car') {
            table.ajax.reload();
          }
          carShopHeader();
        }
      );
    }
  } catch (e) {
    console.log(e);
  }
  $('#main-body').css('padding', '0');
};

const confirmPeticionCar = () => {
  return new Promise((resolve, reject) => {
    bootbox.prompt({
      size: '50',
      value: 'number',
      inputType: 'number',
      title: '¿Cuál es la cantidad que quiere agregar a su carro?',
      callback: (result) => {
        resolve({
          result: result
        });
        reject({
          result: result
        });
      }
    });
  });
};

const removeCar = (articulo) => {
  bootbox.prompt({
    size: '50',
    value: 'number',
    inputType: 'number',
    title: '¿Cuál es la cantidad que quiere quitar de su carro?',
    callback: (result) => {
      if (result) {
        $.post(
          `../api/api-carrito.php?action=removeTheNumber&id=${articulo}&cantidad=${result}`,
          (e) => {
            bootbox.alert(e);
            if (valueName === 'car') {
              table.ajax.reload();
            }
            carShopHeader();
          }
        );
      }
    }
  });
  $('#main-body').css('padding', '0');
};

const addCarOne = async (articulo) => {
  try {
    await wishConfirm(articulo);
    let confirm = await bootboxConfirm();
    if (confirm.result) {
      let obj = await addPeticion(articulo);
      if (obj.result === 'SI') {
        $.post(`../api/api-carrito.php?action=add&id=${articulo}`, (e) => {
          bootbox.alert(e);
          carShopHeader();
        });
      }
    }
  } catch (e) {
    console.log(e);
  }
  $('#main-body').css('padding', '0');
};

const bootboxConfirm = () => {
  let confirm = false;
  return new Promise((resolve, reject) => {
    bootbox.confirm('¿Esta seguro de agregar este articulo?', (result) => {
      if (result) {
        confirm = true;
      }
      resolve({
        result: confirm
      });
      reject({
        result: confirm
      });
    });
  });
};

const wishConfirm = (articulo) => {
  let wishID = $('#' + 'wishID' + articulo).val();
  let resolveT = false;
  return new Promise((resolve, reject) => {
    if (valueName === 'wish') {
      resolveT = true;
      $.post('../ajax/deseos.php?op=borrar', { iddeseo: wishID }, (e) => {
        bootbox.alert(e);
        wishShopHeader();
        wishList();
      });
    }
    resolve({
      result: resolveT
    });
    reject({
      result: resolveT
    });
  });
};

const addPeticion = (articulo, cantidad = 1, cantidadCar = 0) => {
  let ans = '';
  return new Promise((resolve, reject) => {
    $.post(
      '../ajax/articulo.php?op=stockPrev',
      { articulo: articulo, cantidad: cantidad, cantidadCar: cantidadCar },
      (e) => {
        e = JSON.parse(e);
        ans = e.results;
        if (ans !== 'SI') {
          bootbox.alert(e.results);
        }
        resolve({
          result: ans,
          data: e
        });
        reject({
          result: 'NO'
        });
      }
    );
  });
};

const removeCarOne = (articulo) => {
  bootbox.confirm('¿Esta seguro de quitar este articulo?', (result) => {
    if (result) {
      $.post(`../api/api-carrito.php?action=remove&id=${articulo}`, (e) => {
        bootbox.alert(e);
        carShopHeader();
      });
    }
  });
  $('#main-body').css('padding', '0');
};

const limpiarCarrito = () => {
  $.ajax({
    type: 'GET',
    url: '../api/api-carrito.php?action=emptyCar',
    success: (data) => {}
  });
};

const addWish = (idarticulo) => {
  let idusuario = $('#idusuario').val();
  $.post(
    '../ajax/deseos.php?op=insertar',
    { idarticulo: idarticulo, idusuario: idusuario },
    (data) => {
      bootbox.alert(data);
      wishShopHeader();
    }
  );
};

const removeWish = (iddeseo) => {
  $.post('../ajax/deseos.php?op=eliminar', { iddeseo: iddeseo }, (data) => {
    bootbox.alert(data);
    wishShopHeader();
  });
};

if ($('#idusuario').val() !== null) {
  wishShopHeader();
}

if (valueName === 'verificador') {
  limpiarCarrito();
}

if (valueName === 'index') {
  listarIndexAsync();
}

valueName !== 'articulo' &&
valueName !== 'categoria' &&
valueName !== 'venta' &&
valueName !== 'consultaVentas'
  ? carShopHeader()
  : '';

setTimeout(() => {
  try {
    if (peticiones !== undefined) {
      for (let i = 0; i < peticiones.length; ++i) {
        addCarP(peticiones[i]);
      }
    }
  } catch (e) {
    console.log(e);
  }
}, 2000);
