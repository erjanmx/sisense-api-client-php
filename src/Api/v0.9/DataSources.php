<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class DataSources
 *
 * @package Sisense\Api\V09
 */
class DataSources extends AbstractApi
{
    protected $resourcePath = 'datasources';

    /**
     * Get Revision ID By Full Name
     *
     * @param string $server
     * @param string $title
     * @return array
     */
    public function getRevisionId(string $server, string $title) : array
    {
        $path = $this->getPath(sprintf('%s/%s/revision', $server, $title));

        return $this->get($path);
    }
}
