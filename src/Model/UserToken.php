<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Model;

use Dduers\HumanDiversity\AppController;
use DB\SQL\Mapper;
use Dduers\HumanDiversity\Utility\General;

class UserToken extends Mapper
{
    private $_db;

    public function __construct()
    {
        $this->_db = AppController::service('database')::getService();
        parent::__construct($this->_db, 'user_token');
    }

    /**
     * check, if a token exists
     * @param string $token_
     * @return bool
     */
    public function tokenExists(string $token_): bool
    {
        $this->load(['securitytoken = ?', $token_]);
        return !$this->dry();
    }

    /**
     * get the cookie database record
     * @param string $token_
     * @return NULL|array
     */
    public function getTokenRecord(string $token_)
    {
        $this->load(['securitytoken = ?', $token_]);
        if ($this->dry())
            return NULL;
        return $this->cast();
    }

    /**
     * create a token
     * @param string $token_
     * @param int $id_user_ user id to create the token for
     * @return NULL|string id of the new record, '' on error
     */
    public function createToken(string $token_, int $id_user_)
    {
        $_identifier = General::createToken();

        $this->reset();
        $this->copyfrom([
            'id_user' => $id_user_,
            'identifier' => $_identifier,
            'securitytoken' => $token_,
        ]);
        $this->insert();

        if (!$this->get('_id'))
            return NULL;

        return $_identifier;
    }

    /**
     * update cookie by identifier
     * @return bool true on success, false on error
     */
    public function updateCookie(): bool
    {
        /*
        $this->load(['identifier = ?', $_COOKIE['identifier']]);

        if ($this->dry())
            return false;

        // create a new token
        $_securitytoken = $this->createRandomString();

        // update database
        $this->set('securitytoken', password_hash($_securitytoken, PASSWORD_DEFAULT));

        if ($this->changed())
            $this->update();
        */

        return true;
    }

    /**
     * verify the current cookie against data database
     */
    public function verifyCookie(): bool
    {
        if (!(isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])))
            return false;

        $this->load(['identifier = ?', $_COOKIE['identifier']]);

        if ($this->dry() || !password_verify($_COOKIE['securitytoken'], (string)$this->get('securitytoken')))
            return false;

        return true;
    }

    /**
     * delete a cookie by identifier
     * @param string $identifier_
     */
    public function deleteToken(string $token_)
    {
        $this->erase(['securitytoken = ?', $token_]);
    }
}
