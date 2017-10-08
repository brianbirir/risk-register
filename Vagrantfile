# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  # config.vm.network :forwarded_port, guest: 8080, host: 5000
  config.vm.network :forwarded_port, guest: 80, host: 8008 # ruleblox dashboard
  config.vm.network :forwarded_port, guest: 3009, host: 9003 # phpmyadmin
  config.vm.network :forwarded_port, guest: 3306, host: 6033 # mysql
  config.vm.synced_folder "", "/var/www/risk-register"
end
