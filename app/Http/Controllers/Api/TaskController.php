<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       $task_list = Task::all()->toArray();
       if(count($task_list) > 0)
       {
            foreach($task_list as $tl)
            {
                $resp_obj[] = [
                    "id" => $tl["id"],
                    "name" => $tl["name"]
                ];
            }
            
            return response()->json([
                "tasks" => $resp_obj
            ]);

        }
        else{
            return response()->json([
                "tasks" => []
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // validation
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            
        ]);
         
        if ($validator->fails()) {
             return response()->json([
                "message" => $validator->messages()->first()
            ]);
        }

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        $resp_obj = [
            "id" => $task->id,
            "name" => $task->name
        ];
       
        return response()->json([
            "task" => $resp_obj
        ], 200);




    }
    
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'list_item' => 'required',
            
        ]);
         
        if ($validator->fails()) {
             return response()->json([
                "message" => $validator->messages()->first()
            ]);
        }
        
        $list_items = $request->list_item;
        foreach($list_items as $li){
            $task= Task::find($li);
            $task->delete();
        }
        return response()->json([
            "msg" => "task deleted"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
