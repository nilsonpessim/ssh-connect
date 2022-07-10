<?php

namespace Nilsonpessim\SshConnect;

/**
 *
 */
class Message
{

    /**
     * @var $message
     */
    private $message;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param $message
     * @return void
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

}