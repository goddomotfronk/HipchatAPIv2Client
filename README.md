# Hipchat v2 Api Client

Based on [**gorkalaucirica/HipchatAPIv2Client**](https://github.com/gorkalaucirica/HipchatAPIv2Client)

PHP Library to process calls to Hipchat's v2 REST API

[![Latest Stable Version](https://poser.pugx.org/solutiondrive/hipchat-v2-api-client/v/stable)](https://packagist.org/packages/solutiondrive/hipchat-v2-api-client)
[![Total Downloads](https://poser.pugx.org/solutiondrive/hipchat-v2-api-client/downloads)](https://packagist.org/packages/solutiondrive/hipchat-v2-api-client)
[![Latest Unstable Version](https://poser.pugx.org/solutiondrive/hipchat-v2-api-client/v/unstable)](https://packagist.org/packages/solutiondrive/hipchat-v2-api-client)
[![License](https://poser.pugx.org/solutiondrive/hipchat-v2-api-client/license)](https://packagist.org/packages/solutiondrive/hipchat-v2-api-client)
[![Build Status](https://travis-ci.org/solutionDrive/HipchatAPIv2Client.svg?branch=master)](https://travis-ci.org/solutionDrive/HipchatAPIv2Client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/solutionDrive/HipchatAPIv2Client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/solutionDrive/HipchatAPIv2Client/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/fe1dde4f-3158-45db-8f9a-315f97f2cd54/mini.png)](https://insight.sensiolabs.com/projects/fe1dde4f-3158-45db-8f9a-315f97f2cd54)

*This package is work in progress and some functionality is not available yet.*

## Installation

The recommended way to install Hipchatv2ApiClient is through [Composer](https://getcomposer.org).
To install this library, run the command below and you will get the latest version:

    composer require solutiondrive/hipchat-v2-api-client
    
## Usage

All queries need the following two lines. The first one is to authenticate yourself and the second one creates a
client that is used by the API classes to perform requests to the API. That is enough to start, now check the API calls
section to see how to use the `$client` to send requests to the API.

    use SolutionDrive\HipchatAPIv2Client\Auth\OAuth2;
    use SolutionDrive\HipchatAPIv2Client\Client;

    $auth = new OAuth2('tokenYouCanGetInHipchatSite');
    $client = new Client($auth);
    
## Client for private instances

After version 1.5.0 you can set the URL in the constructor to change the base url used by the client (by default uses 
`https://api.hipchat.com`

    $client = new Client($auth, null, 'https.//api.yourdomain.com');

## API calls

All API call methods are located in the API folder. All of them have been documented and all have a link to Hipchat v2
API documentation. Some examples:

#### Getting user by mention name:

    use SolutionDrive\HipchatAPIv2Client\API\UserAPI;

    $userAPI = new UserAPI($client);
    $user = $userAPI->getUser('@gorkalaucirica');

#### Getting all rooms
    
    use SolutionDrive\HipchatAPIv2Client\API\RoomAPI;

    $roomAPI = new RoomAPI($client);
    $room = $roomAPI->getRooms(array('max-results' => 30));

## Current status

The following list shows methods available and missing:

#### Add ons
- [ ] Get addon installable data
- [ ] Create addon link
- [ ] Invoke addon link
- [ ] Delete addon link

#### Capabilities
- [ ] Get capabilities

#### Emoticons
- [ ] Get emoticon
- [ ] Get all emoticons

#### OAuth Sessions
- [ ] Generate token
- [ ] Get session
- [ ] Delete session

#### Rooms
- [x] Get all rooms
- [x] Create room
- [x] Get room
- [x] Update room
- [x] Delete room
- [ ] Get avatar
- [ ] Update avatar
- [ ] Delete avatar
- [ ] Get room message
- [ ] View room history
- [x] View recent room history
- [x] Invite user
- [x] Add member
- [x] Remove member
- [ ] Get all members
- [ ] Send message
- [x] Send room notification
- [ ] Get all participants
- [ ] Reply to message
- [ ] Share file with room
- [ ] Get room statistics
- [x] Set topic
- [ ] Get webhook
- [x] Delete webhook
- [x] Get all webhooks
- [x] Create webhook

#### Users
- [x] Get all users
- [x] Create user
- [x] View user
- [x] Update user
- [x] Delete user
- [ ] Get privatechat message
- [x] View recent privatechat history
- [x] Private message user
- [x] Get photo
- [ ] Upload photo
- [ ] Delete photo
- [ ] Get auto join rooms
- [ ] Share file with user
- [ ] Share link with user

