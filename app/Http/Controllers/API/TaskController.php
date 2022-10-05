<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Http\Resources\TaskResource;
use App\Models\Repositories\TaskRepository;
use App\Validators\imageValidator;
use App\Validators\TaskValidator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    private TaskValidator $taskValidator;
    private TaskRepository $taskRepository;
    private imageValidator $imageValidator;

   public function __construct(TaskValidator $taskValidator,imageValidator $imageValidator,TaskRepository $taskRepository)
  {
    $this->groupValidator = $taskValidator;
    $this->taskRepository = $taskRepository;
    $this->imageValidator = $imageValidator;

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_tasks()
    {

       $data = TaskResource::collection($this->taskRepository->all());
       return response()->json(['success' => true, 'data'=>$data, 'code'=>200]);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_task(Request $request)
    {
        $validator = $this->groupValidator->validate($request);
        if ($validator instanceof JsonResponse) {
            return $validator;
        }
        $image_valid = $this->imageValidator->validate($request);
            if ($image_valid instanceof JsonResponse) {
                return $image_valid;
            }
        $this->taskRepository->store($request);
        return response()->json(['success' => true, 'message'=>('added success'), 'code'=>200]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function task($id)
    {
       $task = $this->taskRepository->find($id);
       if($task == 'error'){
        return response()->json([
            'status'=>false ,
            'message'=>'Opps ! This Task Not Found Or This ID Not Correct',
            'code'=>400 ,
        ],400);
       }
        $data = new TaskResource($task);
        return response()->json(['success' => true, 'data'=>$data, 'code'=>200]);

    }


    public function delete_task($id)
    {
        $this->taskRepository->delete($id);
        return response()->json(['success' => true, 'message'=>__('Deleted Success'), 'code'=>200]);

    }
}
