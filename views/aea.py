import pygame
import sys
import random
import turtle
#COLORES
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)
GREEN = (0, 255, 0)
RED = (255, 0, 0)
BLUE = (0, 0, 255)2345
#PANTALLA
ANCHO=1000
ALTO=800
#JUGADOR
JUGADOR_POS=[500,750]
JUGADOR_TAM=25
#ENEMIGO1
ENEMIGO_TAM=20
ENEMIGO_POS=[random.randint(0,ANCHO-ENEMIGO_TAM),30]
#ENEMIGO2
ENEMIGO_TAM2=20
ENEMIGO_POS2=[random.randint(0,ANCHO-ENEMIGO_TAM),30]

#ventana
ventana= pygame.display.set_mode((ANCHO,ALTO))
game_over=False
clock=pygame.time.Clock()

#Funciones
def detectar_colision(JUGADOR_POS,ENEMIGO_POS):
    jx=JUGADOR_POS[0]
    jy=JUGADOR_POS[1]
    ex=ENEMIGO_POS[0]
    ey=ENEMIGO_POS[1]
    
    if (ex>jx and ex<(jx+JUGADOR_TAM)) or (jx>=ex and jx<(ex+ENEMIGO_TAM)):
       if (ey>jy and ey<(jy+JUGADOR_TAM)) or (jy>=ex and jy<(ey+ENEMIGO_TAM)):
           return True
    return False

while not game_over:
    for event in pygame.event.get():
        if event.type ==pygame.QUIT:
            sys.exit()
        if event.type == pygame.KEYDOWN:
           x=JUGADOR_POS[0] 
           if x>=9:
             if event.key == pygame.K_LEFT:
              x-=JUGADOR_TAM
             if event.key == pygame.K_RIGHT:
              x+=JUGADOR_TAM
             JUGADOR_POS[0]=x
           else:
               x=10
               JUGADOR_POS[0]=x
           if x<=ANCHO-2:
             if event.key == pygame.K_LEFT:
              x-=JUGADOR_TAM
             if event.key == pygame.K_RIGHT:
              x+=JUGADOR_TAM
             JUGADOR_POS[0]=x
           else:
               x=ANCHO-3
               JUGADOR_POS[0]=x
           
           

    ventana.fill(BLACK)
   #Movimiento enemigo 1
    if ENEMIGO_POS[1]>=0 and ENEMIGO_POS[1]<ALTO:
       ENEMIGO_POS[1]+=20
    else:
       ENEMIGO_POS[0]=random.randint(0,ANCHO-ENEMIGO_TAM)
       ENEMIGO_POS[1]=0
   #moviemiento enemigo 2
    if ENEMIGO_POS2[1]>=0 and ENEMIGO_POS2[1]<ALTO:
       ENEMIGO_POS2[1]+=25
    else:
       ENEMIGO_POS2[0]=random.randint(0,ANCHO-ENEMIGO_TAM)
       ENEMIGO_POS2[1]=0

    #Colisiones
    if detectar_colision(JUGADOR_POS,ENEMIGO_POS):
        game_over=True

    #DIBUJAR ENEMIGO1
    pygame.draw.circle(ventana, RED, (ENEMIGO_POS[0], ENEMIGO_POS[1]), ENEMIGO_TAM, ENEMIGO_TAM)

    #DIBUJAR ENEMIGO2
    pygame.draw.circle(ventana, RED, (ENEMIGO_POS2[0], ENEMIGO_POS2[1]), ENEMIGO_TAM2, ENEMIGO_TAM2)
    

    #Dibujar jugador
    pygame.draw.circle(ventana, GREEN, (JUGADOR_POS[0], JUGADOR_POS[1]), JUGADOR_TAM, JUGADOR_TAM)



    clock.tick(40)#Velocidad
    pygame.display.update()