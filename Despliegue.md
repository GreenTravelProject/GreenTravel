<h1 align="center">GREEN TRAVEL</h1>

## INTRODUCCIÓN

Esta web está realizada con Laravel, un framework del lenguje de programación php. 
Para su creación hemos usados distintos lenguajes de programación:

- HTML/CSS
- Javascript
- PHP
- MySQL

Además de estos, hemos usados distintas herramientas: 

- Composer
- Git
- Archivos propios de GitHub (.gitignore)

Todo el proyecto ha sido realizado en [Visual Studio Code](https://code.visualstudio.com/).

## INSTALACIÓN

Para el proyecto en tu ordenador deberás clonarlo. Debes posicionarte en la ruta que quieras que se descarge en tu consola de *Git* y copiar la url. Escribe:
- ```git clone https://github.com/GreenTravelProject/GreenTravel.git```

A continuación tendrás que enlazar el archivo *.env* a tu base de datos y escribir en consola:
* ```composer update``` (Esto creará la carpeta vendor, que no se subirá a Github)

Con esto, ejecuta el servidor de artisan y abre en el navegador la url que se te indique:
- ```php artisan key:generate```

Una vez hecho esto, tendrás que instalar *Node.js* para poder ejecutar el proyecto. Escribe en consola:
- ```npm i node```

Node se ha instalado. Se te ha una carpeta (node_modules) dentro de otro .gitignore, para que no se suba a Github. Ahora ejecuta:
- ```npm run dev```

Con esto, tu web debe al menos funcionar. Para que este al 100% lista, deberás añadir tu script de MySQL a la carpeta *database*, no sin antes dejar todos los campos de imágenes como nulos por defecto. Dentro de la ruta *database/seeders* se encuentra el archivo *ScriptSeeder.php*, en el debes escribir el nombre de tu script dentro de la función database_path. Una vez hecho esto dirigete a *database/seeders/DatabaseSeeder.php* y escribe el nombre de la clase donde se aloja el script (*ScriptSeeder.php* en este caso). Con todo este procedimiento podrás ejecutar toda tu base de datos automáticamente con un simple comando: 
- ```php artisan migrate:fresh --seed```

Ya estaría completamente desplegada la web junto con la base de datos y todas sus funcionalidades.
