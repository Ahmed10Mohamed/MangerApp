<?php

namespace App\Models\Repositories;


use App\Interfaces\Models\IBaseModel;
use App\Interfaces\Repositories\IBaseRepository;
use App\Models\Group;
use App\Models\JoinRoom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GroupRepository implements IBaseRepository
{

    public function all():Collection
    {

        return Group::orderBy('id', 'DESC')->get();
    }

    public function query():Builder
    {
        return Group::query();

    }

    public function find($id)
    {
        $group = Group::find($id);
        if ($group == null) {
            return 'error';
        }
        return $group;
    }


    public function store(Request $request )
    {

       $group = new Group();
       $group->name = $request->name;
       $group->save();
       return $group;
    }


    public function update( $id, Request $request )
    {

        $group =  Group::find($id);
        $group->name = $request->name;

        $group->save();
        return $group;
    }

    public function delete($id)
    {
        $group = Group::findorfail($id);
        $group->delete();
    }









}
