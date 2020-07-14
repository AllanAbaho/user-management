<?php


namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        $project = new Project(); /// create model object
        $validator = Validator::make($request->all(),$project->rules);
        if ($validator->fails()) {
            return Redirect::to('projects/create')
                ->withErrors($validator);
        }else{
            Project::create([
                'project_name' => $request->project_name,
                'scope' => $request->scope,
                'duration'=>$request->duration,
                'participants'=>$request->participants,

            ]);
            Session::flash('message', 'Successfully added new user!');
            return Redirect::to('projects/index');
        }
    }

    public function edit($id){
        $project = Project::find($id);
        return view('projects.edit',[
            'project'=> $project,
        ]);
    }

    public function update(Request $request, $id){
        $project = Project::find($id);
        $project->project_name = $request->project_name;
        $project->scope = $request->scope;
        $project->duration = $request->duration;
        $project->participants = $request->participants;
        $project->save();
        Session::flash('message', 'Successfully updated project!');
        return Redirect::to('projects/index');
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        Session::flash('message', 'Successfully deleted project!');
        return Redirect::to('projects/index');
    }
}
