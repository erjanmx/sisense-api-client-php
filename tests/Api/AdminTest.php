<?php

namespace Tests\Api;

/**
 * Class AdminTest
 */
class AdminTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Admin::getAllDashboards()
     */
    public function testGetAllDashboards()
    {
        $this->expects('v1/dashboards/admin', 'GET', ['query' => ['limit' => 1]]);

        $this->clientMock->admin->getAllDashboards(['limit' => 1]);
    }

    /**
     * @covers \Sisense\Api\Admin::encryptDatabasePassword()
     */
    public function testEncryptDatabasePassword()
    {
        $this->expects('v1/app_database/encrypt_database_password', 'GET', ['query' => ['plaintext' => 'pwd']]);

        $this->clientMock->admin->encryptDatabasePassword('pwd');
    }

    /**
     * @covers \Sisense\Api\Admin::getAllDashboardsWithExtendedModel()
     */
    public function testGetAllDashboardsWithExtendedModel()
    {
        $this->expects('v1/dashboards/admin', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->getAllDashboardsWithExtendedModel(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::getAllDashboardsExtended()
     */
    public function testGetAllDashboardsExtended()
    {
        $this->expects('v1/dashboards/search', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->getAllDashboardsExtended(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::logActionToUsageAnalytics()
     */
    public function testLogActionToUsageAnalytics()
    {
        $this->expects('v1/usageanalytics/log-action', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->logActionToUsageAnalytics(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::restoreUsageAnalyticsCube()
     */
    public function testRestoreUsageAnalyticsCube()
    {
        $this->expects('v1/usageanalytics/restore/cube', 'POST');

        $this->clientMock->admin->restoreUsageAnalyticsCube();
    }

    /**
     * @covers \Sisense\Api\Admin::restoreUsageAnalyticsDashboards()
     */
    public function testRestoreUsageAnalyticsDashboards()
    {
        $this->expects('v1/usageanalytics/restore/dashboards', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->restoreUsageAnalyticsDashboards(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::getUsageMetadata()
     */
    public function testGetUsageMetadata()
    {
        $this->expects('v1/usageanalytics/1/usageMetadata', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->getUsageMetadata(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::changeDashboardOwner()
     */
    public function testChangeDashboardOwner()
    {
        $this->expects('v1/dashboards/1/admin/change_owner', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->changeDashboardOwner(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::changeMongoUserPassword()
     */
    public function testChangeMongoUserPassword()
    {
        $this->expects('v1/app_database/change_database_user_password', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->admin->changeMongoUserPassword(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Admin::replaceDataSource()
     */
    public function testReplaceDataSource()
    {
        $this->expects('v1/dashboards/s/t/replace_datasource', 'POST', [
            'query' => ['dashboardId' => 'id'],
            'json' => ['foo' => 'bar'],
        ]);

        $this->clientMock->admin->replaceDataSource('s', 't', 'id', ['foo' => 'bar']);
    }
}
