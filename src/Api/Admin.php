<?php

namespace Sisense\Api;

/**
 * Class Admin
 *
 * @package Sisense\Api
 */
class Admin extends AbstractApi
{
    protected $resourcePath = 'v1/dashboards';

    /**
     * Get all dashboards
     *
     * @param array $parameters
     * @return array
     */
    public function getAllDashboards(array $parameters = []) : array
    {
        $path = $this->getPath('admin');

        return $this->get($path, $parameters);
    }

    /**
     * Change dashboard owner
     *
     * @param string $id
     * @param array $ownerData
     * @return array
     */
    public function changeDashboardOwner(string $id, array $ownerData) : array
    {
        $path = $this->getPath(sprintf('%s/admin/change_owner', $id));

        return $this->post($path, ['ownerData' => $ownerData]);
    }

    /**
     * Replace Data Source
     *
     * @param string $server
     * @param string $title
     * @param string $dashboardId
     * @param array $dataSource
     * @return array
     */
    public function replaceDataSource(
        string $server,
        string $title,
        string $dashboardId = '',
        array $dataSource = []
    ) : array {
        $path = $this->getPath(sprintf('%s/%s/replace_datasource', $server, $title));

        $options = [
            'query' => [
                'dashboardId' => $dashboardId,
            ],
            'json' => [
                'datasource' => $dataSource,
            ]
        ];

        return $this->post($path, $options);
    }
}
