<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Palettes
 *
 * @package Sisense\Api\V09
 */
class Palettes extends AbstractApi
{
    protected $resourcePath = 'palettes';

    /**
     * Returns a list of available palettes in the Sisense web app.
     *
     * @return array
     */
    public function getAll(): array
    {
        $path = $this->getPath('');

        return $this->get($path);
    }

    /**
     * Returns the default color palette.
     *
     * @return array
     */
    public function getDefault(): array
    {
        $path = $this->getPath('default');

        return $this->get($path);
    }

    /**
     * Adds a new color palette.
     *
     * @param array $parameters
     * @return array
     */
    public function addPalette(array $parameters) : array
    {
        $path = $this->getPath('');

        return $this->post($path, $parameters);
    }

    /**
     * Updates the dashboard's color palette.
     *
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function updatePalette(string $name, array $parameters) : array
    {
        $path = $this->getPath($name);

        return $this->put($path, $parameters);
    }

    /**
     * Deletes a color palette from the color palettes.
     *
     * @param string $name
     * @return array
     */
    public function deletePalette(string $name) : array
    {
        $path = $this->getPath($name);

        return $this->delete($path);
    }
}
