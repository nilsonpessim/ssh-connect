<?php
/* Example SSH Connection */

require "../vendor/autoload.php";
require "config.php";

use Nilsonpessim\SshConnect\SSH;

var_dump(
    (new SSH(CONF_SSH_HOST, CONF_SSH_PORT, CONF_SSH_USER, CONF_SSH_PASS))->exec("ls -la", $stdErr)
);