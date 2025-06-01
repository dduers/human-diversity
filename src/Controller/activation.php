<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\HumanDiversity\AppController;
use Dduers\HumanDiversity\Model\User;

final class activation extends AppController
{
    function get()
    {
        $_user = new User();

        $_code = self::vars('GET.code');
        if (!$_code) {
            self::_message('danger', self::vars('DICT.message.activation.fail'));
            return;
        }

        $_success = $_user->activateUser($_code);
        if (!$_success) {
            self::_message('danger', self::vars('DICT.message.activation.fail'));
            return;
        }

        self::_message('success', self::vars('DICT.message.activation.success'));
        self::_reroute('login');
        return;
    }
}
