#!/bin/bash

# Forzar Apache a usar public
sed -i 's#/home/site/wwwroot#/home/site/wwwroot/public#g' /etc/apache2/sites-available/000-default.conf

apache2-foreground