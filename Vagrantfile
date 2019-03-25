# -*- mode: ruby -*-
# vi: set ft=ruby :

$script = <<-SCRIPT
echo copying NGINX configuration file
cp -ap /vagrant/server_config/nginx/server.conf /etc/nginx/conf.d
cp -ap /vagrant/server_config/nginx/phpmyadmin.conf /etc/nginx/conf.d
echo remove default NGINX config file
sudo rm /etc/nginx/sites-enabled/default
echo Restart NGINX
systemctl restart nginx
SCRIPT

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  # config.vm.network :forwarded_port, guest: 8080, host: 5000
  config.vm.network :forwarded_port, guest: 80, host: 8008 # ruleblox dashboard
  config.vm.network :forwarded_port, guest: 3009, host: 9003 # phpmyadmin
  config.vm.network :forwarded_port, guest: 3306, host: 6033 # mysql
  config.vm.synced_folder "", "/var/www/risk-register"

  # provision with shell scripts
  config.vm.provision "shell", path: "provision.sh"
  config.vm.provision "shell", inline: $script
end
