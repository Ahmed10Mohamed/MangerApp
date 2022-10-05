<?php

namespace App\Models\Repositories;


use App\Interfaces\Models\IBaseModel;
use App\Interfaces\Repositories\IBaseRepository;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientRepository implements IBaseRepository
{

    public function all():Collection
    {

        return Client::orderBy('id', 'DESC')->get();
    }

    public function query():Builder
    {
        return Client::query();

    }

    public function update($id ,$request){

    }

    public function find($id)
    {
        return Client::find($id);
    }


    public function store(Request $request )
    {


       $client = new Client();
       $client->full_name = $request->full_name;
       $client->password = bcrypt($request->password);
       $client->phone = $request->phone;

       $client->save();
       return $client;
    }


    public function edit(Request $request )
    {
       
    }
    public function delete($id)
    {

    }











}
