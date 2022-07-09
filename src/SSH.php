<?php

namespace Nilsonpessim\SshConnect;

/**
 * SSH Connection
 * Nilson Pessim - TechLabs
 */

class SSH
{

    /**
     * @param $host
     * @param $port
     * @param $user
     * @param $pass
     */
    public function __construct($host = "127.0.0.1", $port = "22", $user = "root", $pass = "")
    {
        self::fail_ssh();

        if (!self::connect($host, $port)){
            die("<h1>Connection Failed</h1>");
        }

        if (!self::authPassword($user, $pass)){
            die("<h1>Authentication Failed</h1>");
        }
    }


    /**
     * @param $host
     * @param $port
     * @return bool
     */
    public function connect($host, $port)
    {
        $this->connection = ssh2_connect($host, $port);
        return $this->connection ? true : false;
    }


    /**
     * @param $user
     * @param $pass
     * @return bool
     */
    public function authPassword($user, $pass)
    {
        return $this->connection ? ssh2_auth_password($this->connection,$user,$pass) : false;
    }

    /**
     * @return bool
     */
    public function disconnect()
    {
        if($this->connection) ssh2_disconnect($this->connection);
        $this->connection = null;
        return true;
    }

    /**
     * @param $stream
     * @param $id
     * @return false|string
     */
    private function getOutput($stream, $id)
    {
        $streamOut = ssh2_fetch_stream($stream,$id);
        return stream_get_contents($streamOut);
    }


    /**
     * @param $command
     * @param $stdErr
     * @return false|string|null
     */
    public function exec($command, &$stdErr = null)
    {
        if(!$this->connection) return null;

        if (!$stream = ssh2_exec($this->connection,$command)) {
            return null;
        }

        stream_set_blocking($stream,true);

        $stdIo  = $this->getOutput($stream,SSH2_STREAM_STDIO);
        $stdErr = $this->getOutput($stream,SSH2_STREAM_STDERR);

        stream_set_blocking($stream,false);

        return $stdIo;
    }

    /**
     * @return $this|void
     */
    public function fail_ssh()
    {
        if (!extension_loaded('ssh2')) {
            die("<h1>This system requires the php_ssh2 extension!</h1>");
        }

        return $this;
    }
}

?>