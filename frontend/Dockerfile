FROM yiisoftware/yii2-php:7.4-apache

WORKDIR /app

COPY . ./

RUN composer install

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/frontend/web|g' /etc/apache2/sites-available/000-default.conf

RUN /usr/local/bin/php /app/init --env=Production --overwrite=All --delete=All
