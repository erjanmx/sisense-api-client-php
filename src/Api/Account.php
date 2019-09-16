<?php

namespace Sisense\Api;

/**
 * Class Account
 *
 * @package Sisense\Api
 */
class Account extends AbstractApi
{
    protected $resourcePath = 'v1/account';

    /**
     * Validate activation token
     *
     * @param string $token
     * @return array
     */
    public function activate(string $token) : array
    {
        $path = $this->getPath(sprintf('activate/%s', $token));

        return $this->get($path);
    }

    /**
     * Returns your Sisense licensing information
     *
     * @return array
     */
    public function getLicenseInfo() : array
    {
        $path = $this->getPath('get_license_info');

        return $this->get($path);
    }

    /**
     * Validate password reset token
     *
     * @param string $token
     * @return array
     */
    public function validateResetToken(string $token) : array
    {
        $path = $this->getPath(sprintf('reset_password/%s', $token));

        return $this->get($path);
    }

    /**
     * Begin user activation
     *
     * @param array $emailObj
     * @return array
     */
    public function beginActivate(array $emailObj) : array
    {
        $path = $this->getPath('begin_activate');

        return $this->post($path, ['json' => $emailObj]);
    }

    /**
     * Activate user
     *
     * @param string $token
     * @param array $passwordObject
     * @return array
     */
    public function activateUser(string $token, array $passwordObject) : array
    {
        $path = $this->getPath(sprintf('activate/%s', $token));

        return $this->post($path, ['json' => $passwordObject]);
    }

    /**
     * Bulk begin user activation
     *
     * @param array $emailList
     * @return array
     */
    public function beginActivateBulk(array $emailList) : array
    {
        $path = $this->getPath('begin_activate_bulk');

        return $this->post($path, ['json' => $emailList]);
    }

    /**
     * Begin reset password process
     *
     * @param array $emailObject
     * @return array
     */
    public function beginResetPassword(array $emailObject) : array
    {
        $path = $this->getPath('begin_reset_password');

        return $this->post($path, ['json' => $emailObject]);
    }

    /**
     * Finalize password reset
     *
     * @param string $token
     * @param array $passwordObject
     * @return array
     */
    public function finalizePasswordReset(string $token, array $passwordObject) : array
    {
        $path = $this->getPath(sprintf('reset_password/%s', $token));

        return $this->post($path, ['json' => $passwordObject]);
    }
}
