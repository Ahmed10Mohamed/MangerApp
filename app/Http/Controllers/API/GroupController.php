<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Models\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GroupController extends Controller
{
    private GroupValidator $groupValidator;
    private GroupRepository $groupRepository;
   public function __construct(GroupValidator $groupValidator,GroupRepository $groupRepository)
  {
    $this->groupValidator = $groupValidator;
    $this->groupRepository = $groupRepository;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $data = GroupResource::collection($this->groupRepository->all());
       return response()->json(['success' => true, 'data'=>$data, 'code'=>200]);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->groupValidator->validate($request);
        if ($validator instanceof JsonResponse) {
            return $validator;
        }
        $this->groupRepository->store($request);
        return response()->json(['success' => true, 'message'=>('added success'), 'code'=>200]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->groupValidator->validate($request);
        if ($validator instanceof JsonResponse) {
            return $validator;
        }
        $this->groupRepository->update($id,$request);

        return response()->json(['success' => true, 'message'=>('updated success'), 'code'=>200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->groupRepository->delete($id);
        return response()->json(['success' => true, 'message'=>__('Deleted Success'), 'code'=>200]);

    }
}
