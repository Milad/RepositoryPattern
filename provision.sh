#!/usr/bin/env bash

sudo apt-get update
echo "Installing curl / wget / nano"
sudo apt-get install -y -qq curl wget nano  git unzip

# Install Apache
#echo "Installing Apache"
#apt-get install -y -qq apache2
#a2enmod rewrite

# Install PHP
echo "Installing PHP 7"
sudo apt-get install -y -qq php php-mcrypt php-mbstring php-mysql php-xml php-zip php-cli php-mbstring

# Install composer
# https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04
echo "Installing composer"
curl -sS https://getcomposer.org/installer -o ~/composer-setup.php
sudo php ~/composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm ~/composer-setup.php

# Install PHPUnit / PHPMD / PHP_CodeSniffer
echo "Installing PHPUnit / PHPMD / PHP_CodeSniffer"
curl -Ls https://phar.phpunit.de/phpunit-6.0.phar -o phpunit.phar
curl -Ls http://static.phpmd.org/php/latest/phpmd.phar -o phpmd.phar
curl -Ls https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar -o phpcs.phar
curl -Ls https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar -o phpcbf.phar
chmod +x php*.phar
for f in *.phar; do sudo mv $f /usr/local/bin/`basename $f .phar`; done;
