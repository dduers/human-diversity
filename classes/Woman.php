<?php
declare(strict_types=1);

final class Woman extends Human 
{
    public function getGender(): string
    {
        return 'female';
    }
}
