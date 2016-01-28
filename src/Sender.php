<?php

namespace Trustpilot\Api\Invitation;

class Sender
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $replyEmail;

    /**
     * @param string $email
     * @param string $name
     * @param string $replyEmail
     */
    public function __construct($email, $name, $replyEmail)
    {
        $this->email = $email;
        $this->name = $name;
        $this->replyEmail = $replyEmail;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getReplyEmail()
    {
        return $this->replyEmail;
    }
}
