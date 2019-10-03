<?php

/**
 * Class EventMessage
 */
class EventMessage
{
    public const VERSION = 1;

    private $token;

    private $status;

    private $message;

    private $body;

    public function getVersion() : int
    {
        return self::VERSION;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setToken($token) : void
    {
        $this->token = $token;
    }

    public function setStatus($status) : void
    {
        $this->status = $status;
    }

    public function setMessage($message) : void
    {
        $this->message = $message;
    }

    public function setBody($body) : void
    {
        $this->body = $body;
    }

    public function get()
    {
        return json_encode([
            'version' => self::VERSION,
            'token'   => $this->token,
            'status'  => $this->status,
            'message' => $this->message,
            'body'    => $this->body
        ]);
    }

    public function set($eventMessage) : void
    {
        $em = json_decode($eventMessage);
        $this->setToken($em['token']);
        $this->setStatus($em['status']);
        $this->setMessage($em['message']);
        $this->setBody($em['body']);
    }
}
