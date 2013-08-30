cakePHP-LSV
===========

cakePHP ready to use

Models :    User, Section and Content

Language :  eng, fra

#Includes
* Bootstrap3 http://getbootstrap.com/
* CakeStrap (modified for bootstrap3) https://github.com/Rhym/cakeStrap
* Ckeditor http://ckeditor.com/
* KCfinder http://kcfinder.sunhater.com/
* Minify https://github.com/maurymmarques/minify-cakephp

#Install
* Create database, create Config/database.php
* Execute init.sql
* Search @todo change and edit this vars for your webserver
* Go to /admin/users/add and create a user
* Comment UsersController beforeFilter
* Install Minify in Plugin/Minify https://github.com/maurymmarques/minify-cakephp
* Don't forget to change value of Security.salt and Security.cipherSeed  in code.php
* Finaly change permission to /tmp and /webroot/kcfinder/upload


