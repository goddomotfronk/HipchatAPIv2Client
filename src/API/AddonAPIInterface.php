<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author:    Tobias Lückel <lueckel@solutionDrive.de>
 * @date:      16.12.17
 * @time:      19:08
 * @copyright: 2017 solutionDrive GmbH
 */

namespace SolutionDrive\HipchatAPIv2Client\API;


use SolutionDrive\HipchatAPIv2Client\Model\AddonInterface;

interface AddonAPIInterface
{
    /**
     * Creates a new addon link
     * More info: https://www.hipchat.com/docs/apiv2/method/create_integration_link
     *
     * @param AddonInterface $addon Addon to create link for
     *
     * @return string
     */
    public function createAddonLink(AddonInterface $addon);
}
