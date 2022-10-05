<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Models\IBaseModel;
use App\Models\User;
use Illuminate\Http\Request;

interface IPersonRepository
{
        public function all();

        public function query();

        public function findById(?int $id);

        public function store(Request $request , array $additional=[]);

        public function update(User $user , Request $request );

        public function detach($model);



}
