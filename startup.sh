#!/bin/bash

# Cambiar el DocumentRoot de Apache para que apunte a /public
sed -i 's!/home/site/wwwroot!/home/site/wwwroot/public!g' /etc/apache2/sites-available/000-default.conf
sed -i 's!/home/site/wwwroot!/home/site/wwwroot/public!g' /etc/apache2/apache2.conf

# Habilitar mod_rewrite por si acaso
a2enmod rewrite

service apache2 reload