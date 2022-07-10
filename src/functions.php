<?php

/**
 * @param $message
 * @return string
 */
function msgErrorConnect($message)
{
    $objMessage = new \Nilsonpessim\SshConnect\Message();
    $objMessage->setMessage($message);

    return "<h1> {$objMessage->getMessage()} </h1>";
}

/**
 * @param $message
 * @return string
 */
function msgErrorAuth($message): string
{
    $objMessage = new \Nilsonpessim\SshConnect\Message();
    $objMessage->setMessage($message);

    return "<h1> {$objMessage->getMessage()} </h1>";
}

/**
 * @param $message
 * @return string
 */
function msgErrorLib($message): string
{
    $objMessage = new \Nilsonpessim\SshConnect\Message();
    $objMessage->setMessage($message);

    return "<h1> {$objMessage->getMessage()} </h1>";
}