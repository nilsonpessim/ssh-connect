## :rocket: SSH Connection
* :star_struck: Installation and Configuration Repository.

## :computer: Requirements
Components needed to install dependencies.

* :heavy_check_mark: composer
* :heavy_check_mark: PHP 7.4+
* lib php-ssh2

## :atom: Installation

* In the Config folder, rename the *Config-Example.php* file to *Config.php*, open the file and enter your credentials:
``` 
define("CONF_SSH_HOST", "127.0.0.1");
define("CONF_SSH_USER", "root");
define("CONF_SSH_PASS", "");
define("CONF_SSH_PORT", 22);
```

* In the main directory, the composer.json file has all the project settings, just run it with composer.
``` 
composer install
```

* Install Lib - *Tested on ubuntu 18.04*:
``` 
apt -y update && apt -y upgrade
apt -y install php-ssh2
service apache2 restart
```

* Basic use:
``` 
index.php file in project root
```

## :heart_eyes_cat: Desenvolvedor
[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white&link=https://github.com/nilsonpessim)](https://github.com/nilsonpessim)
[![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://br.linkedin.com/in/nilsonpessim)](https://br.linkedin.com/in/nilsonpessim)
[![Whatsapp Badge](https://img.shields.io/badge/-Whatsapp-4CA143?style=flat-square&labelColor=4CA143&logo=whatsapp&logoColor=white&link=https://api.whatsapp.com/send?phone=5537999351046)](https://api.whatsapp.com/send?phone=5537999351046)
