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
            self::_message('danger', self::vars('DICT.message.login.fail.general'));
            return;
        }
        if (!$_user->isAccountActivated((string)self::vars('POST.email'))) {
            self::_message('danger', self::vars('DICT.message.login.fail.activation'));
            return;
        }
        $_token = $_auth_service::login((string)self::vars('POST.email'), (string)self::vars('POST.password'), (bool)(self::vars('POST.stayloggedin') ?? false));
        if (!$_token) {
            self::_message('danger', self::vars('DICT.message.login.fail.general'));
            return;
        }

        self::_message('success', self::vars('DICT.message.login.success'));
        self::_reroute('home');
        return;
    }
}
