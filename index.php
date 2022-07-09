<?php
/*
 * Example SSH Connection
 */
require "vendor/autoload.php";
use Source\App\SSH;

$objSSH = new SSH();

/*
// SSH Connect Host - Optional (host, port)
if (!$objSSH->connect()) {
    die('Connection Failed');
}

// SSH Auth Host - Optional (username, password)
if (!$objSSH->authPassword()) {
    die('Authentication Failed');
}
*/

// Examples
var_dump(
    ["pwd "    => $objSSH->exec("pwd", $stdErr)],
    ["whoami " => $objSSH->exec("whoami", $stdErr)],
    ["ls -la " => $objSSH->exec("ls -la", $stdErr)]
);