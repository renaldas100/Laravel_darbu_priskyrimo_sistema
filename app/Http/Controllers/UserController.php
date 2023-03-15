<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(){

        $users=User::paginate(2);

        return view('users.index',[
            'users'=>$users,
        ]);

    }

    public function edit(Request $request){

        if(Gate::denies('changePasswordUser')){
            return redirect()->route('users.index');
        }
//        dd($request->id);
        $user=User::find($request->id);
//        dd($user);

        return view('users.edit',[
            'user'=>$user
        ]);
    }

    public function update(Request $request, $id){

//        dd($id);
//        dd($request->password);
       $request->validate([
           'password'=>'required|min:8'
       ],[
           'password.required'=>'Slaptažodį įvesti būtina',
           'password.min'=>'Būtina min 8 simboliai',
       ]);
        $user = User::find($id);
        $user->password=password_hash($request->password,PASSWORD_DEFAULT) ;
        $user->save();
//        dd($user);

        return redirect()->route('users.index');

    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
//        dd($user);
        $tasks = $user->tasks;
//        dd($tasks);
        $pictures=$user->pictures;
//        dd($pictures[1]);

        foreach ($pictures as $picture) {
            unlink(storage_path() . "/app/public/users/" . $picture->name);
            $picture->delete();
        }

        foreach ($tasks as $task) {
            $task->users()->detach($id);
        }

        $user->delete();
        return redirect()->route("users.index");

    }

}
