<?php

namespace App\Models\Repositories;


use App\Interfaces\Models\IBaseModel;
use App\Interfaces\Repositories\IBaseRepository;
use App\Interfaces\Repositories\ImageVideoUpload;
use App\Models\JoinRoom;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TaskRepository implements IBaseRepository
{

    private ImageVideoUpload $ImageUpload;
    public function __construct(ImageVideoUpload $ImageUpload)
    {
        $this->ImageUpload = $ImageUpload;
    }
    public function all():Collection
    {

        return Task::orderBy('id', 'DESC')->where('user',auth('api')->user()->id)->get();
    }

    public function query():Builder
    {
        return Task::query();

    }

    public function find($id)
    {
       $task = Task::find($id);
        if ($task == null) {
            return 'error';
        }
        return$task;
    }


    public function store(Request $request )
    {
        $request_image = $request->file('image');
        $model = 'Task';


      $task = new Task();
      $task->title = $request->title;
      $task->details = $request->details;
      $task->group = $request->group;
      $task->user = auth('api')->user()->id;
      $task->image = $this->ImageUpload->StoreImage($request_image,$model);

      $task->save();
       return$task;
    }


    public function update( $id, Request $request )
    {


    }

    public function delete($id)
    {
       $task = Task::findorfail($id);
       if (File::exists(public_path().$task->image))
       {
           File::delete(public_path().$task->image);
       }
       $task->delete();
    }









}
