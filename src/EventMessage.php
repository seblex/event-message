<?php

namespace Nachtiga11\EventMessage\Src;

/**
 * Class EventMessage
 */
final class EventMessage
{
    public const VERSION = 1;

    private $id;

    private $token;

    private $eventType;

    private $userId;

    private $serviceId;

    private $nodeId;

    private $createdAt;

    private $debugInfo;

    private $body;

    /**
     * @return int
     */
    public function getVersion() : int
    {
        return self::VERSION;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getDebugInfo()
    {
        return $this->debugInfo;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @return mixed
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $token
     */
    public function setToken($token) : void
    {
        $this->token = $token;
    }

    /**
     * @param $id
     */
    public function setId($id) : void
    {
        $this->id = $id;
    }

    /**
     * @param $eventType
     */
    public function setEventType($eventType) : void
    {
        $this->eventType = $eventType;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId) : void
    {
        $this->userId = $userId;
    }

    /**
     * @param $debugInfo
     */
    public function setDebugInfo($debugInfo) : void
    {
        $this->debugInfo = $debugInfo;
    }

    /**
     * @param $body
     */
    public function setBody($body) : void
    {
        $this->body = $body;
    }

    /**
     * @param $serviceId
     */
    public function setServiceId($serviceId) : void
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @param $nodeId
     */
    public function setNodeId($nodeId) : void
    {
        $this->nodeId = $nodeId;
    }

    /**
     * @param $createdAt
     */
    public function setCreatedAt($createdAt) : void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return false|string
     */
    public function get()
    {
        return json_encode([
            'version'       => self::VERSION,
            'token'         => $this->getToken(),
            'debugInfo'     => $this->getDebugInfo(),
            'body'          => $this->getBody(),
            'serviceId'     => $this->getServiceId(),
            'nodeId'        => $this->getNodeId(),
            'createdAt'     => $this->getCreatedAt(),
            'id'            => $this->getId(),
            'eventType'     => $this->getEventType(),
            'userId'        => $this->getUserId()
        ]);
    }

    /**
     * @param $eventMessage
     * @return bool
     */
    public function set($eventMessage) : bool
    {
        $em = json_decode($eventMessage);
        if ($this->checkVersion($em->version)) {
            foreach ($em as $prop => $value) {
                $method = 'set' . ucfirst($prop);
                if (method_exists(self::class, $method)) {
                    $this->$method($value);
                }
            }
            return true;
        }

        return false;
    }

    /**
     * @param $version
     * @return bool
     */
    private function checkVersion($version) : bool
    {
        if ($version === self::VERSION) {
            return true;
        }
        return false;
    }
}
