<?php

namespace SolutionDrive\HipchatAPIv2Client\API;

use SolutionDrive\HipchatAPIv2Client\ClientInterface;
use SolutionDrive\HipchatAPIv2Client\Model\User;
use SolutionDrive\HipchatAPIv2Client\Model\Message;
use SolutionDrive\HipchatAPIv2Client\Model\UserInterface;

class UserAPI implements UserAPIInterface
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
    public function getAllUsers($parameters = array())
    {
        $response = $this->client->get('/v2/user', $parameters);

        $users = array();
        foreach ($response['items'] as $response) {
            $users[] = new User($response);
        }

        return $users;
    }

    /**
     * @inheritdoc
     */
    public function getUser($userId)
    {
        $response = $this->client->get(sprintf('/v2/user/%s', $userId));

        return new User($response);
    }

    /**
     * @inheritdoc
     */
    public function createUser(UserInterface $user, $password)
    {
        $request = $user->toJson();
        $request['password'] = $password;
        $response = $this->client->post('/v2/user', $request);

        return $response['id'];
    }

    /**
     * @inheritdoc
     */
    public function updateUser(UserInterface $user)
    {
        $request = $user->toJson();
        $this->client->put(sprintf('/v2/user/%s', $user->getId()), $request);
    }

    /**
     * @inheritdoc
     */
    public function deleteUser($userId)
    {
        $this->client->delete(sprintf('/v2/user/%s', $userId));
    }

    /**
     * @inheritdoc
     */
    public function privateMessageUser($userId, $message)
    {
        if (is_string($message)) {
            $content = array('message' => $message);
        } else { // Assuming its a Message
            $content = $message->toJson();
        }
        $this->client->post(sprintf('/v2/user/%s/message', $userId), $content);
    }

    /**
     * @inheritdoc
     */
    public function getRecentPrivateChatHistory($userId, array $parameters = array())
    {
        $response = $this->client->get(
            sprintf('/v2/user/%s/history/latest', $userId),
            $parameters
        );

        $messages = array();
        foreach ($response['items'] as $response) {
            $messages[] = new Message($response);
        }

        return $messages;
    }

    /**
     * @inheritdoc
     */
    public function getPrivateChatMessage($user, $messageId, array $parameters = array())
    {
        $response = $this->client->get(
            sprintf('/v2/user/%s/history/%s', $user, $messageId),
            $parameters
        );

        $message = new Message($response['message']);

        return $message;
    }

    /**
     * @inheritdoc
     */
    public function getPhoto($userId, $size)
    {
        $response = $this->client->get(
            sprintf('/v2/user/%s/photo/%s', $userId, $size)
        );

        return $response;
    }
}
