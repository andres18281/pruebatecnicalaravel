Reglas para ejecutar el proyecto completo

1. Primeramente descargue este repositorio
2. Verifique que el servicio de Docker este funcionando correctamente.
3. Una vez descargado el repositorio, ejecute el comando docker-compose up --build
4. luego de que ejecute este comando, espere a que en la consola que este ejecutando muestre el mensaje "MySQL está listo en mysql. Continuando..."
5. para iniciar el servicio de vue en el front, ejecute en el navegador http://localhost:8080/
6. Una vez iniciado el servicio del front de vue, debera registrarse en la aplicacion para poder iniciar en el sistema.
7. una vez ingresado, podra ver opcion de "producto" y "usuarios", cada menu proporcionara la opcion para ver o productos asignados a personas o personas asignados a productos
8. En la opcion de producto podra crear los productos y asociar a personas, en la opcion de usuarios podra asociar productos a los usuarios, si requiere crear mas usuarios,
   debera registrarse con mas usuarios en el sistema.
9. Si desea eliminar los contenedores, con ctrl + c y docker-compose down podra eliminar los contenedores.
