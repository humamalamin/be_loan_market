# LOAN MARKET BANCKEND ADMIN

This is the repository for the backend admin of the LOAN MARKET project.

## Prerequisites

**Install NGINX**

```bash
sudo apt install -y nginx
```

**Install PHP and required service**

```bash
sudo apt install -y php-fpm php-mbstring php-gd php-xml php-cli php-zip unzip curl openssl pkg-config git autoconf automake libxml2-dev libcurl4-openssl-dev libssl-dev openssl gettext libicu-dev libmcrypt-dev libmcrypt4 libbz2-dev libreadline-dev gettext build-essential libmhash-dev libmhash2 libicu-dev libxslt-dev zlib1g-dev libzip-dev make
```
**Install PHPBrew**

Please check the [Official PHPBrew Documentation](https://github.com/phpbrew/phpbrew) for installation.

**Install PHP 7.4 on PHPBrew**

```bash
phpbrew install 7.4 +default +fpm +pdo
# See installed php version with phpbrew list
phpbrew switch php-7.4.x
```

**Install Composer**

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```
## Installation

Please check the official laravel installation guide for server requirements before you start. [Laravel Official Documentation](https://laravel.com/docs/6.x)

**Clone this repository**

```bash
git clone git@github.com:humamalamin/be_loan_market.git
# Switch to the repository folder
cd be_loan_market
chmod +x artisan
```
**Install Dependencies**

```bash
composer install
```

**Copy the `.env.example` file to `.env`**

```bash
cp .env.example .env
```

## Directory Structure

We use Laravel 7, please visit [Laravel Directory Structure](https://laravel.com/docs/7.x/structure) for a description of the directory structure.

## Reference

* [Laravel Documentation](https://laravel.com/docs/6.x)
