## What do we need ?
Vagrant: https://www.vagrantup.com/ <br>
Virtualbox: https://www.virtualbox.org/wiki/Downloads <br>
Composer: https://getcomposer.org/ <br>
Instruction for installing the composer (ubuntu 20.04):
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04

```
#install vargrant
$ sudo apt install vagrant

#install virtualbox
$ sudo apt install virtualbox
```

## Project setup
```
$ composer install
$ cp .env.example .env
$ php vendor/laravel/homestead make
$ cp Homestead.example.yaml Homestead.yaml

#Change default values in Homestead.yaml for your project root

$ vagrant up
$ vagrant ssh
$ cd pc-builder
```
## Host setup
It's required to add a host name into /etc/hosts: <br>
go to /etc <br>
open hosts file  
add line at the beginning of file:
```
192.168.10.10 	~~hackthetrack~~.local
```
You can open hosts file by command:
```
sudo gedit /etc/hosts
or
sudo nano /etc/hosts
```

Now site should be visible at address: http://pc-builder.local/
