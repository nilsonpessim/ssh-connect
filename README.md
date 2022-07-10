## Library for SSH connection
This php library is used to connect to remote hosts via SSH

## Requirements
You need the php_ssh2 library installed in your environment.

* [Install Library Linux](https://github.com/nilsonpessim/ssh-connect/wiki/Install-library-on-Linux-system) - *Tested on Ubuntu 18.04*
* [Install Library Windows](https://github.com/nilsonpessim/ssh-connect/wiki/Install-library-on-Windows-system) - *Tested on Windows 11 - xampp v3.3.0 - php 8.1.6*

## Composer:
```
composer require nilsonpessim/ssh-connect
```

## Basic Use:

```
<?php

require "../vendor/autoload.php";
use Nilsonpessim\SshConnect\SSH;

var_dump(
    (new SSH('127.0.0.1', 22, root, ''))->exec('ls -la')
);
```

[![Whatsapp Badge](https://img.shields.io/badge/-Whatsapp-4CA143?style=flat-square&labelColor=4CA143&logo=whatsapp&logoColor=white&link=https://api.whatsapp.com/send?phone=5537999351046)](https://api.whatsapp.com/send?phone=5537999351046)
