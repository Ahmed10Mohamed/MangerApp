<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface IHaveJsonField
{
    public function existsByJson(string $name , array $value):bool ;

}
