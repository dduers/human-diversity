<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\HumanDiversity\AppController;
use Dduers\HumanDiversity\Model\User;
use Dduers\HumanDiversity\Utility\General;
use Dduers\F3App\Service\MailService;
use Template;

final class register extends AppController
{
    function get()
    {
    }

    function post()
    {
        $_service_smtp = MailService::instance();
        $_model_user = new User();
        $_utility_general = new General();

        if ($_model_user->isEmailUsed(self::vars('POST.email'))) {
            self::_message('danger', self::vars('DICT.message.register.fail.emailused'));
            return;
        }

        if (!$_utility_general->isComplexPassword(self::vars('POST.password'))) {
            self::_message('danger', self::vars('DICT.message.register.fail.passwordcomplexity'));
            return;
        }

        if (self::vars('POST.password') !== self::vars('POST.password_verify')) {
            self::_message('danger', self::vars('DICT.message.register.fail.passwordmismatch'));
            return;
        }

        $_user_record = $_model_user->registerUser(self::vars('POST'));
        if (!$_user_record) {
            self::_message('danger', self::vars('DICT.message.register.fail.general'));
            return;
        }

        self::vars('VIEWVARS.code', $_user_record['code_activation']);

        $_service_smtp::sendMail(
            [
                $_user_record['email'] => $_user_record['username']
            ],
            self::vars('DICT.mail.register.activation.subject'),
            Template::instance()->render('mail/register.html')
        );

        self::_message('success', self::vars('DICT.message.register.success'));
        self::_reroute('login');
        
        return;
    }
}
