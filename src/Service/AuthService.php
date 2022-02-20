<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Service;

use Base;
use Prefab;
use Dduers\F3App\Service\InputService;
use Dduers\F3App\Service\SessionService;
use Dduers\F3App\Service\CookieService;
use Dduers\F3App\Utility\JWTUtility;
use Dduers\HumanDiversity\Model\User;
use Dduers\HumanDiversity\Model\UserToken;

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
    private static InputService $_service_input;
    private static SessionService $_service_session;
    private static CookieService $_service_cookie;
    private static JWTUtility $_utility_jwt;
    private static User $_user;
    private static UserToken $_user_token;
    
    function __construct()
    {
        self::$_f3 = Base::instance();
        self::$_service_input = InputService::instance();
        self::$_service_session = SessionService::instance();
        self::$_utility_jwt = JWTUtility::instance();
        self::$_service_cookie = CookieService::instance();
        self::$_user = new User();
        self::$_user_token = new UserToken(); 
        self::$_utility_jwt::setOptions(self::$_f3->get('CONF.jwt.options'));
    }

    /**
     * login, generate token
     * @param string $email_ user email address
     * @param string $password_ plain text password
     * @param bool (optional) $stay_loggedin_ wether to set stay logged in cookie or not
     * @return NULL|string identifier - '' on error
     */
    static public function login(string $email_, string $password_, bool $stay_loggedin_ = false)
    {
        $_identifier = '';

        if (!$email_ || !$password_ || !filter_var($email_, FILTER_VALIDATE_EMAIL))
            return NULL;

        $_record_user = self::$_user->getActivatedUserByEmailAddress($email_);
        if (!count($_record_user) || !password_verify($password_, $_record_user['password'] ?? ''))
            return NULL;

        self::$_user->setLastLoginDate($_record_user['id']);
       
        $_token = self::$_utility_jwt::generate([
            'email' => $_record_user['email']
        ]);
      
        $_identifier = self::$_user_token->createToken($_token, $_record_user['id']);
        if (!$_identifier) {
            self::$_user_token->deleteToken($_token);
            return NULL;
        }

        self::$_service_cookie::setCookie('_identifier', $_token);
        return $_token;
    }

    /**
     * logout: delete token and session cookie
     * @return void
     */
    static public function logout(): void
    {
        self::$_user_token->deleteToken(self::$_service_input::getBearerToken());
        self::$_service_cookie::setCookie('_identifier', '');
        self::$_service_session::destroy();
        return;
    }

    /**
     * authenticate and clean malicous tokens
     * @return string 
     */
    static public function authenticate(): string
    {
        $_token = self::$_service_input::getBearerToken();

        if (!$_token)
            return self::NOT_AUTHENTICATED;

        $_token_record = self::$_user_token->getTokenRecord($_token);
        if (!$_token_record)
            return self::TOKEN_NOT_EXIST;

        $_user_record = self::$_user->getUserById($_token_record['id_user'], true);
        if (!$_user_record) {
            self::$_user_token->deleteToken($_token);
            return self::TOKEN_OWNER_NOT_EXIST_OR_ACCOUNT_DISABLED;
        }
        if (!self::$_utility_jwt::validate($_token)) {
            self::$_user_token->deleteToken($_token);
            return self::TOKEN_NOT_VERIFY;
        }
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
