<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Controller;

use Dduers\F3App\Service\ResponseService;
use Dduers\F3App\Service\SessionService;
use Dduers\HumanDiversity\AppController;

final class token extends AppController
{
    function get()
    {
        $_response_service = ResponseService::instance();
        $_response_service->setHeader('Content-Type', 'application/json');
        $_response_service->setBody([
            'token' => SessionService::instance()->getToken()
        ]);
    }
}
