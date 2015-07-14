# Product2Bundle
Simple product page created with Symfony2, AngularJS and MongoDB

- [GruntJS](http://gruntjs.com) and (Bower)[http://bower.io] are required.

* Step 1: install mongo DB + PHP Driver
```shell
sudo apt-get install php-pear php5-dev
```
```shell
sudo pecl install mongo
```
   add `extension=mongo.so` to php.ini
   
* Step 2: download this repository
```shell
git clone git@github.com:maalicki/ProductBundle2.git
```
* Step 3: 
Install [composer](https://getcomposer.org) :

```shell
curl -sS https://getcomposer.org/installer | php
```

Install libraries with composer :

```shell
php composer.phar install
```

Configure permissions :

```shell
$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
```

Install assets as symlink

```shell
php app/console assets:install web --symlink
```

>>>>>>> 62f99e585f9ffd32e621eb7a6c92ab8c374125b9
