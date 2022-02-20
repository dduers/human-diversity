<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Model;

use Dduers\HumanDiversity\AppController;
use DB\SQL\Mapper;
use Dduers\HumanDiversity\Utility\General;
use DateTime;
use DateInterval;

final class User extends Mapper
{
    private $_db;

    public function __construct()
    {
        $this->_db = AppController::service('database')::getService();
        parent::__construct($this->_db, 'user');
    }

    /**
     * get all records
     * @param string $order_field_
     * @param string $order_direction_
     * @return array all records
     */
    public function getRecords(string $order_field_ = 'name', string $order_direction_ = 'ASC'): array
    {
        $_result = [];
        foreach ($this->find(NULL, ['order' => $order_field_ . ' ' . $order_direction_]) as $_r)
            $_result[] = $_r->cast();
        return $_result;
    }

    /**
     * check if user account exists
     * @param string $email_
     * @return bool
     */
    public function userExists(string $email_): bool
    {
        $this->load(['email = ?', $email_]);
        return !$this->dry();
    }

    /**
     * register a user
     * @param array $data_
     * @return array|NULL
     */
    public function registerUser(array $data_)
    {
        $this->reset();
        $this->copyfrom([
            'username' => ($data_['username'] ?? '') ?: NULL,
            'email' => ($data_['email'] ?? '') ?: NULL,
            'password' => ($_t = ($data_['password'] ?? '')) ? password_hash($_t, PASSWORD_DEFAULT) : NULL,
            'is_disabled' => 1,
            'code_activation' => General::createToken(),
        ]);
        $this->insert();
        if ($this->get('_id'))
            return $this->cast();
        return NULL;
    }

    /**
     * activate user account
     * @param string $code_activate_account_
     * @return bool
     */
    public function activateUser(string $code_activation_): bool
    {
        $this->load(['code_activation = ?', $code_activation_]);
        if ($this->dry())
            return false;
        $this->set('code_activation', NULL);
        $this->set('is_disabled', 0);
        $this->update();
        return true;
    }

    /**
     * set recovery information
     * @param string $email_
     * @return string recovery code
     */
    public function setRecoveryRequest(string $email_): string
    {
        $this->load(['email = ? AND is_disabled = 0', $email_]);
        if ($this->dry())
            return '';
        $_recovery_expiration = new DateTime();
        $_recovery_expiration->add(new DateInterval('P1D'));
        $_recovery_expiration = $_recovery_expiration->format('Y-m-d H:i:s');
        $_recovery_code = General::createToken();
        $this->set('code_recovery', $_recovery_code);
        $this->set('code_recovery_expire', $_recovery_expiration);
        $this->update();
        return $_recovery_code;
    }

    /**
     * reset password
     * @param string $code_
     * @param string $password_
     * @return bool
     */
    public function recoveryReset(string $code_, string $password_): bool
    {
        $this->load(['code_recovery = ? AND is_disabled = 0', $code_]);
        if ($this->dry())
            return false;
        $_recovery_expiration = new DateTime($this->code_expiration);
        $_recovery_expiration = $_recovery_expiration->format('Y-m-d H:i:s');
        $_now = new DateTime();
        $_now = $_now->format('Y-m-d H:i:s');
        if ($_now > $_recovery_expiration)
            return false;
        $this->set('password', password_hash($password_, PASSWORD_DEFAULT));
        $this->set('code_recovery', NULL);
        $this->set('code_recovery_expire', NULL);
        $this->update();
        return true;
    }
}
