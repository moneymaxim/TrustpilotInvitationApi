<?php

namespace Trustpilot\Api\Invitation;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Trustpilot\Api\Authenticator\AccessToken;

class Client
{
    const ENDPOINT = 'https://invitations-api.trustpilot.com/v1/private/business-units/';

    /**
     * @var AccessToken
     */
    private $accessToken;

    /**
     * @var GuzzleClientInterface
     */
    private $guzzle;

    /**
     * @param string $apiKey
     * @param AccessToken $accessToken
     * @param GuzzleClientInterface $guzzle
     */
    public function __construct(AccessToken $accessToken, GuzzleClientInterface $guzzle = null)
    {
        $this->accessToken = $accessToken;
        $this->guzzle = (null !== $guzzle) ? $guzzle : new GuzzleClient();
    }

    /**
     * @param string $url
     * @param array $json
     * @return array
     */
    private function makeRequest($url, array $json = null)
    {
        $method = 'GET';
        $options = ['query' => ['token' => $this->accessToken->getToken()]];

        if (null !== $json) {
            $method = 'POST';
            $options['json'] = $json;
        }

        $response = $this->guzzle->request($method, $url, $options);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param Context $context
     * @param Recipient $recipient
     * @param Sender $sender
     * @param string $referenceId
     * @param \DateTimeInterface $time
     */
    public function invite(Context $context, Recipient $recipient, Sender $sender, $referenceId, \DateTimeInterface $time = null)
    {
        if (null === $time) {
            $time = new \DateTime();
        }

        $json = [
            'recipientEmail' => $recipient->getEmail(),
            'recipientName' => $recipient->getName(),
            'referenceId' => $referenceId,
            'templateId' => $context->getTemplateId(),
            'locale' => $context->getLocale(),
            'senderName' => $sender->getName(),
            'senderEmail' => $sender->getEmail(),
            'replyTo' => $sender->getReplyEmail(),
            'preferredSendTime' => $time->format('c'),
            'tags' => $context->getTags(),
            'redirectUri' => $context->getRedirectUri(),
        ];

        return $this->makeRequest(self::ENDPOINT . $context->getBusinessUnitId() . '/invitations', $json);
    }
}
