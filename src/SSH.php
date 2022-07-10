<?php

namespace Nilsonpessim\SshConnect;

/**
 * SSH Connection
 * TechLabs - Nilson Pessim
 */

class SSH
{
    /**
     * @var
     */
    private $connection;

    /**
     * @var array|string[]
     */
    private array $msgError = [
        "lib"     => "This system requires the php_ssh2 extension!",
        "connect" => "Connection Failed",
        "auth"    => "Authentication Failed"
    ];

    /**
     * @param $host
     * @param $port
     * @param $user
     * @param $pass
     * @param $error
     */
    public function __construct($host = "127.0.0.1", $port = 22, $user = "root", $pass = "", $error = [])
    {

        if (!extension_loaded("ssh2")) {
            die(msgErrorLib($error["lib"] ?? $this->msgError["lib"]));
        }

        if (!self::connect($host, $port)){
            die(msgErrorConnect($error["connect"] ?? $this->msgError["connect"]));
        }

        if (!self::authPassword($user, $pass)){
            die(msgErrorAuth($error["auth"] ?? $this->msgError["auth"]));
        }
    }

    /**
     * @param $host
     * @param $port
     * @return bool
     */
    public function connect($host, $port): bool
    {
        $this->connection = ssh2_connect($host, $port);
        return (bool)$this->connection;
    }

    /**
     * @param $user
     * @param $pass
     * @return bool
     */
    public function authPassword($user, $pass): bool
    {
        return $this->connection && ssh2_auth_password($this->connection,$user,$pass);
    }

    /**
     * @return bool
     */
    public function disconnect(): bool
    {
        if($this->connection) ssh2_disconnect($this->connection);
        $this->connection = null;
        return true;
    }

    /**
     * @param $stream
     * @param int $id
     * @return string
     */
    private function getOutput($stream, int $id): string
    {
        $streamOut = ssh2_fetch_stream($stream,$id);
        return stream_get_contents($streamOut);
    }

    /**
     * @param string $command
     * @param $stdErr
     * @return string|null
     */
    public function exec(string $command = "ls -la", &$stdErr = null): ?string
    {
        if(!$this->connection) return null;

        if (!$stream = ssh2_exec($this->connection,$command)) {
            return null;
        }

        stream_set_blocking($stream,true);

        $stdIo  = $this->getOutput($stream,SSH2_STREAM_STDIO);
        $stdErr = $this->getOutput($stream,SSH2_STREAM_STDERR);

        stream_set_blocking($stream,false);

        self::disconnect();

        return $stdIo;
    }
}