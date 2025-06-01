<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Service;

use Base;
use Prefab;
use Dduers\F3App\Service\SessionService;
use Dduers\F3App\Utility\JWTUtility;
use Dduers\HumanDiversity\Model\User;

/**
 * authentication singleton
 * extends Prefab class for singletons from f3 framework
 */
final class AuthService extends Prefab
{
    const NOT_AUTHENTICATED = 'NOT_AUTHENTICATED';
    const TOKEN_NOT_EXIST = 'TOKEN_NOT_EXIST';
    const TOKEN_OWNER_NOT_EXIST_OR_ACCOUNT_DISABLED = 'TOKEN_OWNER_NOT_EXIST_OR_ACCOUNT_DISABLED';
    const TOKEN_NOT_VERIFY = 'TOKEN_NOT_VERIFY';
    const AUTHENTICATED = 'AUTHENTICATED';

    private static Base $_f3;
    private static SessionService $_service_session;
    private static JWTUtility $_utility_jwt;
    private static User $_user;

    function __construct()
    {
        self::$_f3 = Base::instance();
        self::$_service_session = SessionService::instance();
        self::$_utility_jwt = JWTUtility::instance();
        self::$_user = new User();
        self::$_utility_jwt::setOptions(self::$_f3->get('CONF.jwt.options'));
    }

    /**
     * login, generate token
     * @param string $email_ user email address
     * @param string $password_ plain text password
     * @param bool (optional) $stay_loggedin_ wether to set stay logged in cookie or not
     * @return bool
     */
    static public function login(string $email_, string $password_, bool $stay_loggedin_ = false): bool
    {
        if (!$email_ || !$password_ || !filter_var($email_, FILTER_VALIDATE_EMAIL))
            return false;
        $_record_user = self::$_user->getActivatedUserByEmailAddress($email_);
        if (!count($_record_user) || !password_verify($password_, $_record_user['password'] ?? ''))
            return false;
        self::$_user->setLastLoginDate($_record_user['id']);
        self::$_f3->set('SESSION.user', $_record_user['email']);
        return true;
    }

    /**
     * logout: delete token and session cookie
     * @return void
     */
    static public function logout(): void
    {
        self::$_f3->clear('SESSION.user');
        self::$_service_session::destroy();
        return;
    }

    /**
     * authenticate and clean malicous tokens
     * @return string 
     */
    static public function authenticate(): string
    {
        if (!self::$_f3->get('SESSION.user'))
            return self::NOT_AUTHENTICATED;
        return self::AUTHENTICATED;
    }

    /**
     * check if user is authenticated
     * @return bool
     */
    static public function isAuthenticated(): bool
    {
        return self::authenticate() === self::AUTHENTICATED;
    }
}
