<?php

namespace SolutionDrive\HipchatAPIv2Client\API;

use SolutionDrive\HipchatAPIv2Client\ClientInterface;
use SolutionDrive\HipchatAPIv2Client\Model\Message;
use SolutionDrive\HipchatAPIv2Client\Model\MessageInterface;
use SolutionDrive\HipchatAPIv2Client\Model\Room;
use SolutionDrive\HipchatAPIv2Client\Model\RoomInterface;
use SolutionDrive\HipchatAPIv2Client\Model\Webhook;
use SolutionDrive\HipchatAPIv2Client\Model\WebhookInterface;


class RoomAPI implements RoomAPIInterface
{
    /** @var ClientInterface */
    protected $client;

    /**
     * Room api constructor
     *
     * @param ClientInterface $client that will be used to connect the server
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function getRooms($params = array())
    {
        $response = $this->client->get("/v2/room", $params);

        $rooms = array();
        foreach ($response['items'] as $response) {
            $rooms[] = new Room($response);
        }
        return $rooms;
    }

    /**
     * @inheritdoc
     */
    public function getRoom($id)
    {
        $response = $this->client->get("/v2/room/$id");

        return new Room($response);
    }

    /**
     * @inheritdoc
     */
    public function getRecentHistory($id, $params = array())
    {
        $response = $this->client->get(sprintf('/v2/room/%s/history/latest', $id), $params);

        $messages = array();
        foreach ($response['items'] as $response) {
            $messages[] = new Message($response);
        }
        return $messages;
    }

    /**
     * @inheritdoc
     */
    public function createRoom(RoomInterface $room)
    {
        $response = $this->client->post("/v2/room", $room->toJson());

        return $response['id'];
    }

    /**
     * @inheritdoc
     */
    public function updateRoom(RoomInterface $room)
    {
        $this->client->put(sprintf("/v2/room/%s", $room->getId()), $room->toJson());
    }

    /**
     * @inheritdoc
     */
    public function deleteRoom($id)
    {
        $this->client->delete(sprintf('/v2/room/%s', $id));
    }

    /**
     * @inheritdoc
     */
    public function sendRoomNotification($id, MessageInterface $message)
    {
        $id = rawurlencode($id);
        $this->client->post("/v2/room/$id/notification", $message->toJson());
    }

    /**
     * @inheritdoc
     */
    public function addMember($roomId, $memberId)
    {
        $this->client->put(sprintf('/v2/room/%s/member/%s', $roomId, $memberId));
    }

    /**
     * @inheritdoc
     */
    public function removeMember($roomId, $memberId)
    {
        $this->client->delete(sprintf('/v2/room/%s/member/%s', $roomId, $memberId));
    }

    /**
     * @inheritdoc
     */
    public function inviteUser($roomId, $memberId, $reason)
    {
        $this->client->post(sprintf('/v2/room/%s/invite/%s', $roomId, $memberId), array('reason' => $reason));
    }

    /**
     * @inheritdoc
     */
    public function setTopic($roomId, $topic)
    {
        $this->client->put(sprintf('/v2/room/%s/topic', $roomId), array('topic' => $topic));
    }

    /**
     * @inheritdoc
     */
    public function createWebhook($roomId, WebhookInterface $webhook)
    {
        $response = $this->client->post(sprintf('/v2/room/%s/webhook', $roomId), $webhook->toJson());

        return $response['id'];
    }

    /**
     * @inheritdoc
     */
    public function deleteWebhook($roomId, $webhookId)
    {
        $this->client->delete(sprintf('/v2/room/%s/webhook/%s', $roomId, $webhookId));
    }

    /**
     * @inheritdoc
     */
    public function getAllWebhooks($roomId)
    {
        $webhooks = array();
        $response = $this->client->get(sprintf('/v2/room/%s/webhook', $roomId));
        foreach ($response['items'] as $item) {
            $webhooks[] = new Webhook($item);
        }

        return $webhooks;
    }
}
