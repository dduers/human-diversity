<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Model;

use Dduers\PDOXpress\PDOXpressConnection;
use Dduers\PDOXpress\PDOXpressDataModel;

class Name extends PDOXpressDataModel
{
    function __construct(PDOXpressConnection $connection)
    {
        parent::__construct($connection, 'name');
    }

    function getMaleNames(): array
    {
        return $this->selectFetchAll(['is_male' => 1], ['name']);
    }

    function getFemaleNames(): array
    {
        return $this->selectFetchAll(['is_female' => 1], ['name']);
    }
}
