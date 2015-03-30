cakePHP-LSV
===========

cakePHP ready to use

Models :    User, Section and Content

Language :  eng, fra

#Includes
* Bootstrap3 http://getbootstrap.com/
* CakeStrap (modified for bootstrap3) https://github.com/Rhym/cakeStrap
*
* Ckeditor http://ckeditor.com/
* KCfinder http://kcfinder.sunhater.com/
* Minify https://github.com/maurymmarques/minify-cakephp
* TranslateEnhancements Behavior Validate and Association https://github.com/joostdekeijzer/CakePHP-TranslateEnhancements

#Install
* Create database, create Config/database.php
* Execute init.sql
* Search @todo change and edit this vars for your webserver
* Change values of Security.salt and Security.cipherSeed  in core.php
* Go to /admin/users/add and create a user
* Comment UsersController beforeFilter
* Install Minify in Plugin/Minify https://github.com/maurymmarques/minify-cakephp
* Finaly change permission to /tmp and /webroot/kcfinder/upload


