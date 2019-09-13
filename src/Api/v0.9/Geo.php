<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Geo
 *
 * @package Sisense\Api\V09
 */
class Geo extends AbstractApi
{
    protected $resourcePath = 'geo';

    /**
     * Get geoJson by type
     *
     * @param string $type
     * @return array
     */
    public function geoJson(string $type) : array
    {
        $path = $this->getPath(sprintf('geoJson/%s', $type));

        return $this->get($path);
    }

    /**
     * Returns geographical coordinates for the given locations
     *
     * @param string $geoParams
     * @return array
     */
    public function getGeo(array $geoParams) : array
    {
        $path = $this->getPath('location');

        return $this->post($path, ['json' => compact('geoParams')]);
    }
}
