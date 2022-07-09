<?php
/* Example SSH Connection */

require "vendor/autoload.php";
use Source\App\SSH;

$objSSH = new SSH();

// Examples
var_dump(
    ["pwd "    => $objSSH->exec("pwd", $stdErr)],
    ["whoami " => $objSSH->exec("whoami", $stdErr)],
    ["ls -la " => $objSSH->exec("ls -la", $stdErr)]
);