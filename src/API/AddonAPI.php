<?php

namespace SolutionDrive\HipchatAPIv2Client\API;

use SolutionDrive\HipchatAPIv2Client\ClientInterface;
use SolutionDrive\HipchatAPIv2Client\Model\AddonInterface;

class AddonAPI implements AddonAPIInterface
{
    /** @var ClientInterface */
    private $client;

    public function __construct(
        ClientInterface $client
    ) {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function createAddonLink(
        AddonInterface $addon
    ) {
        $request = $addon->toJson();
        $response = $this->client->post('/v2/addon/link', $request);
        return $response['token'];
    }
}
