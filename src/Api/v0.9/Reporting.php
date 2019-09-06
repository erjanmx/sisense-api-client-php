<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Reporting
 *
 * @package Sisense\Api\V09
 */
class Reporting extends AbstractApi
{
    protected $resourcePath = 'reporting';

    /**
     * Shares (sends) a dashboard to specified recipients.
     *
     * @param array $sendReports
     * @return array
     */
    public function shareReporting(array $sendReports) : array
    {
        $path = $this->getPath('');

        return $this->post($path, $sendReports);
    }
}
