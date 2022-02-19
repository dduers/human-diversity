<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity;

use Base;
use Dduers\F3App\F3App;

class AppController extends F3App
{
    /**
     * set content disposition header
     * @param string $filename_
     * @param string $type_ (optional)
     * @return void
     */
    static function _content_disposition(string $filename_, string $type_ = 'attachment'): void
    {
        self::header('Content-Disposition', $type_ . '; filename="' . $filename_ . '"');
        return;
    }

    /**
     * create api response message body
     * @param string $result_ success | warning | danger
     * @param string $message_
     * @param array $data_
     * @return void
     */
    static function _message(string $result_, string $message_ = '', array $data_ = []): void
    {
        self::body([
            'result' => $result_,
            'message' => $message_,
            'data' => $data_
        ]);
    }

    /**
     * reroute to version/controller/ressourceid
     * @param string $vers_ version e.g. 'v1'
     * @param string $ctrl_ route controller
     * @param string $id_ ressource id
     * @return void
     */
    static function _reroute(string $ctrl_, string $lang_): void
    {
        $_f3 = Base::instance();
        $_f3->reroute(($lang_ ? '/' . $lang_ : '') . ($ctrl_ ? '/' . $ctrl_ : '') . ($_f3->get('QUERY') ? '?' . $_f3->get('QUERY') : ''));
        return;
    }

    /**
     * custom f3 error handler
     * @param Base $f3_
     * @return bool true = error handled / false = fallback to default handler
     */
    static function _onerror(Base $f3_): bool
    {
        $_message = $f3_->get('ERROR.code') === 500
            ? ($f3_->get('DEBUG')
                ? $f3_->get('ERROR.text')
                : 'Internal Server Error'
            ) : $f3_->get('ERROR.text');
        self::_message('error', $_message, [
            'result' => 'error',
            'code' => $f3_->get('ERROR.code'),
            'message' => $_message
        ]);
        return true;
    }
}
