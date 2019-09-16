<?php

namespace Tests\Api;

/**
 * Class AccountTest
 */
class AccountTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Account::activate()
     */
    public function testActivate()
    {
        $this->expects('v1/account/activate/token', 'GET');

        $this->clientMock->account->activate('token');
    }

    /**
     * @covers \Sisense\Api\Account::getLicenseInfo()
     */
    public function testGetLicenseInfo()
    {
        $this->expects('v1/account/get_license_info', 'GET');

        $this->clientMock->account->getLicenseInfo();
    }

    /**
     * @covers \Sisense\Api\Account::validateResetToken()
     */
    public function testValidateResetToken()
    {
        $this->expects('v1/account/reset_password/token', 'GET');

        $this->clientMock->account->validateResetToken('token');
    }

    /**
     * @covers \Sisense\Api\Account::beginActivate()
     */
    public function testBeginActivate()
    {
        $this->expects('v1/account/begin_activate', 'POST', ['json' => ['e']]);

        $this->clientMock->account->beginActivate(['e']);
    }

    /**
     * @covers \Sisense\Api\Account::activateUser()
     */
    public function testActivateUser()
    {
        $this->expects('v1/account/activate/t', 'POST', ['json' => ['p']]);

        $this->clientMock->account->activateUser('t', ['p']);
    }

    /**
     * @covers \Sisense\Api\Account::beginActivateBulk()
     */
    public function testBeginActivateBulk()
    {
        $this->expects('v1/account/begin_activate_bulk', 'POST', ['json' => ['e-1', 'e-2']]);

        $this->clientMock->account->beginActivateBulk(['e-1', 'e-2']);
    }

    /**
     * @covers \Sisense\Api\Account::beginResetPassword()
     */
    public function testBeginResetPassword()
    {
        $this->expects('v1/account/begin_reset_password', 'POST', ['json' => ['e-1']]);

        $this->clientMock->account->beginResetPassword(['e-1']);
    }

    /**
     * @covers \Sisense\Api\Account::finalizePasswordReset()
     */
    public function testFinalizePasswordReset()
    {
        $this->expects('v1/account/reset_password/t', 'POST', ['json' => ['p']]);

        $this->clientMock->account->finalizePasswordReset('t', ['p']);
    }
}
