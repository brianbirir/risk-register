#!/bin/sh
echo "update packages"
apt-get -y update

# install NGINX
echo "Install Nginx"
apt-get -y install nginx

# install php
apt-get -y install php php-mysql php-fpm

echo "Install MySQL"
# ---------------------------------------
#          MySQL Setup
# ---------------------------------------

# TURN OFF FRONT END PROMPTS FOR MySQL and PHPMYADMIN
export DEBIAN_FRONTEND="noninteractive"


# Setting MySQL root user password
echo "mysql-server-5.6 mysql-server/root_password password toor" | sudo debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password toor" | sudo debconf-set-selections


# Installing packages
apt-get install -y mysql-server mysql-client

# Allow External Connections on your MySQL Service
sudo sed -i -e 's/bind-addres/#bind-address/g' /etc/mysql/mysql.conf.d/mysqld.cnf
sudo sed -i -e 's/skip-external-locking/#skip-external-locking/g' /etc/mysql/mysql.conf.d/mysqld.cnf
mysql -u root -ptoor -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root'; FLUSH privileges;"
sudo service mysql restart

# create client database
echo "create client database"
DATABASE_NAME="riskregister_prod"
mysql -u root -ptoor -e "CREATE DATABASE $DATABASE_NAME;"

echo "import risk register database"
mysql -u root -ptoor $DATABASE_NAME < /vagrant/riskregister.sql


# ---------------------------------------
#          PHPMYADMIN Setup
# ---------------------------------------

echo "set up phpmyadmin"

# install phpmyadmin
APP_PASS="toor"
ROOT_PASS="toor"
APP_DB_PASS="toor"

echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/app-password-confirm password $APP_PASS" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/admin-pass password $ROOT_PASS" | sudo debconf-set-selections
echo "phpmyadmin phpmyadmin/mysql/app-pass password $APP_DB_PASS" | sudo debconf-set-selections
# echo "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2" | sudo debconf-set-selections

apt-get install -y phpmyadmin


# ---------------------------------------
#          NodeJS Setup
# ---------------------------------------
apt-get install -y nodejs
apt-get install -y npm

# symlink
sudo ln -s /usr/bin/nodejs /usr/bin/node

echo "Install bower globally"
sudo npm install -g bower
