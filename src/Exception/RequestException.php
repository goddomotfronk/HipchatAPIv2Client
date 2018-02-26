<?php
/**
 * Created by PhpStorm.
 * User: gorkalaucirica
 * Date: 09/07/14
 * Time: 12:33
 */

namespace SolutionDrive\HipchatAPIv2Client\Exception;


class RequestException extends \Exception implements RequestExceptionInterface
{
    protected $responseCode;

    protected $message;

    protected $type;

    /**
     * Request exception constructor
     *
     * @param string $response json_decoded array with the error response given by the server
     */
    public function __construct($response)
    {
        $message = '';
        $code = null;
        $type = null;
        if (is_string($response)) {
            $message = $response;
        } elseif (is_array($response)) {
            $error = isset($response['error']) ? $response['error'] : '';
            if (isset($error['code'])) {
                $code = $error['code'];
            }
            if (isset($error['message'])) {
                $message = $error['message'];
            }
            if (isset($error['type'])) {
                $type = $error['type'];
            }
        }

        $this->responseCode = $code;
        $this->type = $type;
        parent::__construct($message, $code);
    }

    /**
     * @inheritdoc
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }
}
