Este proyecto se realizo con Larvel 5.4
Este proyecto fue desarrollado usando Laravel 5.4 y homeStead

la llave rsa esta en el proyecto
en caso contrario
no le puse contraseña a ningun archivo

vagrant ssh establece la coneccion con el servidor 
y cd code para acceder a la carpeta del proyecto

###Configuracion del archivo host  ###
192.168.10.12 pizzaapi.test | " esa direccion ip es la misma que el documento homstead.yaml"

Para instalar la maquina virtual de homestead es necesario abrir una de powershell en el directori raiz de la aplicacion
y ejecutar el comando " vagrant up "
este comando comenzara a instalar todas las dependencias necesarias para el testeo de la aplicacion

#este comando " php artisan migrate:refresh --seed "  va a refresca la estructura de las migraciones,
#borrando todas las migraciones que se hayan realizado dejando la base de datos vacia
#luego ejecuta las nuevas migraciones y luego de esto ejecutara los seeders




Las pruebas se realizaron con Postman

Rutas de ejemplo

#direccion principal de la API 
pizzaapi.test



#conbinaciones pre-establecidas
pizzaapi.test/products

###ordenar una pizza###
#products haciendo referencia a la combinacion pre-establecida numero 5
#clientes haciendo referencia al cliente con id 2
#orders indicando que es una orden
#quantity es la cantidad de producto que debe ingresarse por POST en "from-data KEY='quantity' y el VALUE = '5'" por ejemlo de una orden
pizzaapi.test/products/5/clientes/2/orders


###historial ordenes###
# el id del cliente varia por los seeds
pizzaapi.test/clientes/94/orders


#clientes frecuentes
pizzaapi.test/clientestop


#productos mas pedidos
pizzaapi.test/productstop

#Listado de resturantes
pizzaapi.test/restaurantes

