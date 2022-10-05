<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Models\IBaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IBaseRepository
{



    public function all():Collection;


    public function find(?int $id)  ;


    public function query():Builder;

    public function store(Request $request );

    public function update(int $id, Request $request );

    public function delete(?int $id)  ;


}
