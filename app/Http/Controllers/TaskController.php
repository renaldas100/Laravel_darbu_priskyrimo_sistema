<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $task=Task::find(2);
//        dd($task);

        return view("tasks.index",[
            'tasks'=>Task::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("tasks.create",[
            'users'=>User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
        $task=new Task();
        $task->name=$request->name;
        $task->status=$request->status;
     //   $task->date= Carbon::now();
        $task->save();

        $task->users()->attach($request->user_id);
        $task->save();
//        Task::create($request->all());
        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
//        dd($task->id);
//        dd(User::find(1)->tasks);
        return view('tasks.edit',[
            'task'=>$task,
            'users'=>User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
//        dd($task);
        $task->name=$request->name;
        $task->status=$request->status;
        $task->save();
        if($request->user_id!=null){
            $task->users()->attach($request->user_id);
            $task->save();
        }
        return redirect()->route("tasks.edit",[
            'task'=>$task,
            'users'=>User::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
//            dd($task->id);

        foreach($task->users as $user){
            $task->users()->detach($user->id);
            $task->save();
        }
        $task->delete();
        return redirect()->route("tasks.index");

    }

    public function deleteUser($id, $userId){
        $task=Task::find($id);
        $task->users()->detach($userId);
        $task->save();
        return view('tasks.edit',[
            'task'=>$task,
            'users'=>User::all()
        ]);

    }
}
