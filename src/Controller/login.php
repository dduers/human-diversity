<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\HumanDiversity\AppController;
use Dduers\HumanDiversity\Model\User;
use Dduers\HumanDiversity\Service\AuthService;

final class login extends AppController
{
    function get()
    {
    }

    function post()
    {
        $_auth_service = AuthService::instance();
        $_user = new User();

        if (!$_user->userExists((string)self::vars('POST.email'))) {
            self::_message('danger', 'Login failed.');
            return;
        }

        if (!$_user->isAccountActivated((string)self::vars('POST.email'))) {
            self::_message('danger', 'This account must be activated first.');
            return;
        }

        $_token = $_auth_service::login((string)self::vars('POST.email'), (string)self::vars('POST.password'), (bool)(self::vars('POST.stayloggedin') ?? false));
        if (!$_token) {
            self::_message('danger', 'Login failed.');
            return;
        }

        //$_user_record = $_user->getUserByEmailAddress((string)self::vars('POST.email'), true);
        self::_message('success', 'You were successfully logged in.');

        self::_reroute('home');
        return;
    }
}
