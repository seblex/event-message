<?php

namespace Nachtiga11\EventMessage\Src;

/**
 * Class EventMessage
 */
final class EventMessage
{
    public const VERSION = 1;

    private $token;

    private $status;

    private $serviceId;

    private $nodeId;

    private $createdAt;

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

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function getNodeId()
    {
        return $this->nodeId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
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

    public function setServiceId($serviceId) : void
    {
        $this->serviceId = $serviceId;
    }

    public function setNodeId($nodeId) : void
    {
        $this->nodeId = $nodeId;
    }

    public function setCreatedAt($createdAt) : void
    {
        $this->createdAt = $createdAt;
    }

    public function get()
    {
        return json_encode([
            'version'   => self::VERSION,
            'token'     => $this->getToken(),
            'status'    => $this->getStatus(),
            'message'   => $this->getMessage(),
            'body'      => $this->getBody(),
            'serviceId' => $this->getServiceId(),
            'nodeId'    => $this->getNodeId(),
            'createdAt' => $this->getCreatedAt()
        ]);
    }

    public function set($eventMessage) : bool
    {
        $em = json_decode($eventMessage);
        if ($this->checkVersion($em['version'])) {
            foreach ($em as $prop => $value) {
                if (isset($this->$prop)) {
                    $method = 'set' . ucfirst($prop);
                    $this->$method($value);
                }
            }
            return true;
        }

        return false;
        //$this->setToken($em['token']);
        //$this->setStatus($em['status']);
        //$this->setMessage($em['message']);
        //$this->setBody($em['body']);
    }

    private function checkVersion($version) : bool
    {
        if ($version === self::VERSION) {
            return true;
        }
        return false;
    }
}
