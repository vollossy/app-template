#!/usr/bin/env bash


sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password simplepass'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password simplepass'


apt-get update
apt-get install -y mysql-server

sudo sed -i 's/127.0.0.1/0.0.0.0/g' /etc/mysql/my.cnf

mysql -u root --password="simplepass" <<< "use mysql; GRANT ALL ON *.* to root@'%' IDENTIFIED BY 'simplepass'; FLUSH PRIVILEGES;"
mysql -u root --password="simplepass" <<< "CREATE SCHEMA yii2basic"
 
sudo service mysql restart
