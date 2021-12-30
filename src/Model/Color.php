<?php

declare(strict_types=1);

namespace Dduers\HumanDiversity\Model;

use Dduers\PDOXpress\PDOXpressConnection;
use Dduers\PDOXpress\PDOXpressDataModel;

class Color extends PDOXpressDataModel
{
    function __construct(PDOXpressConnection $connection)
    {
        parent::__construct($connection, 'color');
    }
}
