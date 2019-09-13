<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Users
 *
 * @package Sisense\Api
 */
class Users extends AbstractApi
{
    protected $resourcePath = 'users';

    /**
     * The get users endpoint returns a list of users with their details.
     * Results can be filtered by parameters such as username and email.
     * The expandable fields for the user object are groups, adgroups and role.
     *
     * @param array $parameters
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        return $this->get($this->getPath(), ['query' => $parameters]);
    }

    /**
     * Searches for users in Active Directory.
     *
     * @param array $parameters
     * @return array
     */
    public function getAllAd(array $parameters = [])
    {
        $path = $this->getPath('ad');

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Searches for users in all user directories.
     *
     * @param array $parameters
     * @return array
     */
    public function getAllInDirectories(array $parameters = [])
    {
        $path = $this->getPath('allDirectories');

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Counts users using a defined query string.
     *
     * @param array $parameters
     * @return array
     */
    public function getCount(array $parameters = [])
    {
        $path = $this->getPath('count');

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Get a specific user.
     *
     * @param string $user
     * @return array
     */
    public function getUser(string $user) : array
    {
        $path = $this->getPath($user);

        return $this->get($path);
    }

    /**
     * Retrieves my user details.
     *
     * @return array
     */
    public function getLoggedIn()
    {
        $path = $this->getPath('loggedin');

        return $this->get($path);
    }

    /**
     * Adds a new user.
     * @param array $newUser
     * @param string $notify
     * @return array
     */
    public function addUser(array $newUser = [], string $notify = '') : array
    {
        $path = $this->getPath();

        return $this->post($path, [
            'json' => $newUser,
            'query' => compact('notify'),
        ]);
    }

    /**
     * Returns the users and related metadata of a simulated operation that adds multiple users.
     *
     * @param array $parameters
     * @return array
     */
    public function simulate(array $parameters = []) : array
    {
        $path = $this->getPath('simulate');

        return $this->post($path, ['json' => $parameters]);
    }

    /**
     * Imports a user from Active Directory as a new user in Sisense.
     *
     * @param array $user
     * @return array
     */
    public function importFromActiveDirectory(array $user) : array
    {
        $path = $this->getPath('ad');

        return $this->post($path, ['json' => compact('user')]);
    }

    /**
     * Sends a user an email to activate or reset the user's password.
     *
     * @param string $userEmail
     * @return array
     */
    public function forgetPassword(string $userEmail) : array
    {
        $path = $this->getPath('forgetpassword');

        return $this->post($path, ['json' => compact('userEmail')]);
    }

    /**
     * Deletes the user by ID.
     *
     * @param array $parameters
     * @return array
     */
    public function deleteUser(array $parameters) : array
    {
        $path = $this->getPath('delete');

        return $this->post($path, ['json' => $parameters]);
    }

    /**
     * Validates existing users by entering their emails.
     *
     * @param array $parameters
     * @return array
     */
    public function validate(array $parameters) : array
    {
        $path = $this->getPath('validate');

        return $this->post($path, ['json' => $parameters]);
    }

    /**
     * Updates one or more user details, by user ID or username.
     *
     * @param string $user
     * @param array $userUpdate
     * @return array
     */
    public function updateUser(string $user, array $userUpdate) : array
    {
        $path = $this->getPath($user);

        return $this->put($path, $userUpdate);
    }

    /**
     * Deletes a user by user ID or username.
     *
     * @param string $user
     * @return array
     */
    public function deleteByIdOrUserName(string $user) : array
    {
        $path = $this->getPath($user);

        return $this->delete($path);
    }
}
