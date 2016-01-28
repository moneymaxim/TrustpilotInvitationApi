<?php

namespace Trustpilot\Api\Invitation;

class Context
{
    /**
     * @var string
     */
    private $businessUnitId;

    /**
     * @var string
     */
    private $templateId;

    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var string
     */
    private $locale;

    /**
     * @param string $businessUnitId
     * @param string $templateId
     * @param string $redirectUri
     * @param string[] $tags
     * @param string $locale
     */
    public function __construct($businessUnitId, $templateId, $redirectUri, array $tags = null, $locale = 'en-US')
    {
        $this->businessUnitId = $businessUnitId;
        $this->templateId = $templateId;
        $this->redirectUri = $redirectUri;
        $this->tags = (null === $tags) ? [] : $tags;
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getBusinessUnitId()
    {
        return $this->businessUnitId;
    }

    /**
     * @return string
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
