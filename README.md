# Tarea 2 - Software Avanzado - 201213177

Esta tarea consiste en lo siguiente:

Realizar una aplicación SOA para simular los siguientes servicios de carros tipo Uber:

- Solicitud de servicio por parte del cliente
- Recepción de solicitud y aviso al piloto
- Solicitud de ubicación (rastreo) desde la administración del servicio de carros

Debe ser realizado con servicios orquestados por medio de un ESB.  Entregar código fuente y video de demo.

### Requisitos

  - Servidor Apache (en este caso se utilizó [WAMP](http://www.wampserver.com/en/) para más facilidad)
  - [Codeigniter Framework](https://www.codeigniter.com/) (para el ESB)
  - [Guzzle](https://github.com/guzzle/guzzle) (para consumir los microservicios desde PHP)
  - ExpressJS y [Node.js](https://nodejs.org/) v4+ (para los microservicios)
  - [Rester](https://chrome.google.com/webstore/detail/rester/eejfoncpjfgmeleakejdcanedmefagga?hl=en) (para utilizarlo como cliente y simular la solicitud del cliente)

### Instalación

Los pasos más importantes sobre esta instalación son:

- Colocar la carpeta del proyecto de Codeigniter en la siguiente carpeta de WAMP
```sh
C:\wamp64\www\SA_Tarea2_201213177\ESB
```
- Colocar la carpeta descargada de Guzzle dentro de la carpeta
```sh
ESB\application\libraries
```

### Funcionamiento

Para el funcionamiento de la aplicación es necesario ejecutar los siguientes comandos:

- Levantar los microservicios en NodeJS
```sh
$ cd UberMicroservices\Cliente
$ node cliente.js 8081
```
```sh
$ cd UberMicroservices\Piloto
$ node piloto.js 8082
```
```sh
$ cd UberMicroservices\Rastreo
$ node rastreo.js 8083
```

Una vez levantados los servicios, se procede a abrir Rester en el navegador e ingresar las siguientes instrucciones como se muestran a continuación:

- El URL para consumir el ESB es el siguiente:
```sh
http://localhost/SA_Tarea2_201213177/ESB/index.php/api/solicitudUber
```
- Y se deben de ingresar los siguientes parametros:
```sh
id = #numero_que_corresponde_a_un_cliente
coor_x = #numero_entero_aleatorio
coor_y = #numero_entero_aleatorio
```
Al ejecutar el URL anterior con un tipo de llamada GET se puede observar todo el funcionamiento de orquestación del ESB para comunicarse con los microservicios que son los que actualmente alojan en un arreglo los usuarios y pilotos correspondientes.

License
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
