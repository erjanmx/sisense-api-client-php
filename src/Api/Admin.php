<?php

namespace Sisense\Api;

/**
 * Class Admin
 *
 * @package Sisense\Api
 */
class Admin extends AbstractApi
{
    protected $resourcePath = 'v1';

    /**
     * Get all dashboards
     *
     * @param array $parameters
     * @return array
     */
    public function getAllDashboards(array $parameters = []) : array
    {
        $path = $this->getPath('dashboards/admin');

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns an encrypted password from plaintext
     *
     * @param array $plaintext
     * @return array
     */
    public function encryptDataBasePassword(string $plaintext) : array
    {
        $path = $this->getPath('app_database/encrypt_database_password');

        return $this->get($path, ['query' => compact('plaintext')]);
    }

    /**
     * Get all dashboards with extended model
     *
     * @param array $params
     * @return array
     */
    public function getAllDashboardsWithExtendedModel(array $params) : array
    {
        $path = $this->getPath('dashboards/admin');

        return $this->post($path, ['json' => $params]);
    }

    /**
     * Get all dashboards with extended model
     *
     * @param array $params
     * @return array
     */
    public function getAllDashboardsExtended(array $params) : array
    {
        $path = $this->getPath('dashboards/search');

        return $this->post($path, ['json' => $params]);
    }

    /**
     * Write action to usage-analytics
     *
     * @param array $body
     * @return array
     */
    public function logActionToUsageAnalytics(array $body = []) : array
    {
        $path = $this->getPath('usageanalytics/log-action');

        return $this->post($path, ['json' => $body]);
    }

    /**
     * Restore usage analytics cube
     *
     * @param array $body
     * @return array
     */
    public function restoreUsageAnalyticsCube() : array
    {
        $path = $this->getPath('usageanalytics/restore/cube');

        return $this->post($path);
    }

    /**
     * Restore usage analytics dashboards
     *
     * @param array $body
     * @return array
     */
    public function restoreUsageAnalyticsDashboards(array $body = []) : array
    {
        $path = $this->getPath('usageanalytics/restore/dashboards');

        return $this->post($path, ['json' => $body]);
    }

    /**
     * Get usage analytics metadata
     *
     * @param string $id
     * @param array $body
     * @return array
     */
    public function getUsageMetadata(string $id, array $body = []) : array
    {
        $path = $this->getPath(sprintf('usageanalytics/%s/usageMetadata', $id));

        return $this->post($path, ['json' => $body]);
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
        $path = $this->getPath(sprintf('dashboards/%s/admin/change_owner', $id));

        return $this->post($path, ['json' => $ownerData]);
    }

    /**
     * Change a MongoDB user’s password
     *
     * @param array $userObject
     * @return array
     */
    public function changeMongoUserPassword(array $userObject) : array
    {
        $path = $this->getPath('app_database/change_database_user_password');

        return $this->post($path, ['json' => $userObject]);
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
        $path = $this->getPath(sprintf('dashboards/%s/%s/replace_datasource', $server, $title));

        $options = [
            'query' => [
                'dashboardId' => $dashboardId,
            ],
            'json' =>  $dataSource,
        ];

        return $this->post($path, $options);
    }
}
