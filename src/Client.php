<?php

namespace SolutionDrive\HipchatAPIv2Client;

use Buzz\Browser;
use Buzz\Client\Curl;
use SolutionDrive\HipchatAPIv2Client\Auth\AuthInterface;
use SolutionDrive\HipchatAPIv2Client\Exception\RequestException;

class Client implements ClientInterface
{
    protected $baseUrl;

    /** @var AuthInterface */
    protected $auth;

    /** @var Browser */
    protected $browser;

    /**
     * Client constructor
     *
     * @param AuthInterface $auth Authentication you want to use to access the api
     * @param Browser $browser Client you want to use, by default browser with curl will be used
     * @param string $baseUrl URL to the HipChat server endpoint
     *
     * @return self
     */
    public function __construct(AuthInterface $auth, Browser $browser = null, $baseUrl = 'https://api.hipchat.com')
    {
        $this->auth = $auth;
        $this->baseUrl = $baseUrl;
        if ($browser === null) {
            $client = new Curl();
            $this->browser = new Browser($client);
        } else {
            $this->browser = $browser;
        }
    }

    /**
     * @inheritdoc
     */
    public function get($resource, $query = array())
    {
        $url = $this->baseUrl . $resource;
        $url = $this->addQuery($query, $url);

        $headers = array("Authorization" => $this->auth->getCredential());

        try {
            $response = $this->browser->get($url, $headers);
        } catch (\Buzz\Exception\ClientException $e) {
            throw new RequestException($e->getMessage(), $e->getCode(), '', $e);
        }

        $this->checkBrowserResponse();

        return json_decode($response->getContent(), true);
    }

    /**
     * @inheritdoc
     */
    public function post($resource, $content)
    {
        $url = $this->baseUrl . $resource;

        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => $this->auth->getCredential()
        );

        try {
            $response = $this->browser->post($url, $headers, json_encode($content));
        } catch (\Buzz\Exception\ClientException $e) {
            throw new RequestException($e->getMessage(), $e->getCode(), '', $e);
        }

        $this->checkBrowserResponse();

        return json_decode($response->getContent(), true);
    }

    /**
     * @inheritdoc
     */
    public function put($resource, $content = array())
    {
        $url = $this->baseUrl . $resource;
        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => $this->auth->getCredential()
        );

        try {
            $response = $this->browser->put($url, $headers, json_encode($content));
        } catch (\Buzz\Exception\ClientException $e) {
            throw new RequestException($e->getMessage(), $e->getCode(), '', $e);
        }

        $this->checkBrowserResponse();

        return json_decode($response->getContent(), true);
    }

    /**
     * @inheritdoc
     */
    public function delete($resource)
    {
        $url = $this->baseUrl . $resource;

        $headers = array(
            'Authorization' => $this->auth->getCredential()
        );

        try {
            $response = $this->browser->delete($url, $headers);
        } catch (\Buzz\Exception\ClientException $e) {
            throw new RequestException($e->getMessage(), $e->getCode(), '', $e);
        }

        $this->checkBrowserResponse();

        return json_decode($response->getContent(), true);
    }

    /**
     * Add query string if necessary
     *
     * @param $query
     * @param $url
     * @return string
     */
    private function addQuery($query, $url)
    {
        if (count($query) > 0) {
            $url .= "?";
        }

        foreach ($query as $key => $value) {
            $url .= "$key=$value&";
        }
        return $url;
    }

    /**
     * Checks if response was successful
     *
     * @throws RequestException
     */
    private function checkBrowserResponse()
    {
        if ($this->browser->getLastResponse()->getStatusCode() > 299) {
            $response = json_decode($this->browser->getLastResponse()->getContent(), true);
            $code = isset($response['error']['code']) ? $response['error']['code'] : 0;
            $message = isset($response['error']['message']) ? $response['error']['message'] : '';
            $type = isset($response['error']['type']) ? $response['error']['type'] : '';
            throw new RequestException($message, $code, $type);
        }
    }
}
