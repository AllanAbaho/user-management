<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name','scope','duration', 'participants',
    ];


    public $rules = [
        'project_name' => 'required|string|max:20|min:4',
        'scope' => 'required|string|max:20|min:4',
        'duration' => 'required|string|max:12|min:9',
        'participants' => 'required|integer|max:1000|min:1',
    ];
}
