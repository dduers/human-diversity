<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Model;

use Dduers\HumanDiversity\AppController;
use DB\SQL\Mapper;

final class Color extends Mapper
{
    private $_db;

    public function __construct()
    {
        $this->_db = AppController::service('database')::getService();
        parent::__construct($this->_db, 'color');
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
}
