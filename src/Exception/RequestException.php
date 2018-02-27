<?php

namespace SolutionDrive\HipchatAPIv2Client\Exception;

use Throwable;

class RequestException extends \Exception implements RequestExceptionInterface
{
    protected $responseCode;

    protected $message;

    protected $type;

    /**
     * Request exception constructor
     *
     * @param string $message
     * @param int $code
     * @param string $type
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, $type = '', Throwable $previous = null)
    {
        $this->responseCode = $code;
        $this->type = $type;
        parent::__construct($message, $code, $previous);
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
