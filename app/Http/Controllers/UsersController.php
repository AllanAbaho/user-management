<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index(){
        $users = User::all();
        return view('projects.index', [
            'projects' => $users
        ]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        $user = new User; /// create model object
        $validator = Validator::make($request->all(),$user->rules);
        if ($validator->fails()) {
            return Redirect::to('projects/create')
            ->withErrors($validator);
        }else{
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
                'password' => Hash::make('password'),
            ]);
            Session::flash('message', 'Successfully added new user!');
            return Redirect::to('users/index');
        }
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',[
            'user'=> $user,
        ]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->save();
        Session::flash('message', 'Successfully updated user!');
        return Redirect::to('users/index');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Successfully deleted user!');
        return Redirect::to('users/index');
    }
}
