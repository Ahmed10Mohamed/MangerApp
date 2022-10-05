<?php

namespace App\Interfaces\Models;

interface IBaseModel
{
    public static function getViewName():string;

    public static function getStoreRoute():string ;

    public function getUpdateRoute():string ;

    public static function getViewVariables():array ;
}
