<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author:    Tobias Lückel <tl@solutionDrive.de>
 * @date:      01.12.17
 * @time:      19:31
 * @copyright: 2017 solutionDrive GmbH
 */

namespace SolutionDrive\HipchatAPIv2Client\Exception;

interface RequestExceptionInterface extends \Throwable
{
    /**
     * Returns responseCode
     *
     * @return mixed
     */
    public function getResponseCode();

    /**
     * Returns type
     *
     * @return mixed
     */
    public function getType();
}
