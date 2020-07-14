<?php


namespace App\Http\Controllers;

use App\Attendance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AttendanceController extends Controller
{
    public function index(){
        $attendance = Attendance::all();
        return view('attendance.index', [
            'attendance' => $attendance
        ]);
    }

    public function create(){
        return view('attendance.create');
    }

    public function store(Request $request){
        $attendance = new Attendance(); /// create model object
        $validator = Validator::make($request->all(),$attendance->rules);
        if ($validator->fails()) {
            return Redirect::to('attendance/create')
                ->withErrors($validator);
        }else{
           Attendance::create([
                'name' => $request->name,
                'department' => $request-department,
                'status' => $request->status,

            ]);
            Session::flash('message', 'Successfully added new employee!');
            return Redirect::to('attendance/index');
        }
    }

    public function edit($id){
        $attendance = Attendance::find($id);
        return view('attendance.edit',[
            'attendance'=> $attendance,
        ]);
    }

    public function update(Request $request, $id){
        $attendance = Attendance::find($id);
        $attendance->name = $request->name;
        $attendance->department = $request->department;
        $attendance->status = $request->status;
        $attendance->save();
        Session::flash('message', 'Successfully updated employee!');
        return Redirect::to('attendance/index');
    }

    public function delete($id){
        $attendance = Attendance::find($id);
        $attendance->delete();
        Session::flash('message', 'Successfully deleted employee!');
        return Redirect::to('attendance/index');
    }
}
