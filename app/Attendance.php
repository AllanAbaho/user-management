<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'name','department','status',
    ];

    public $rules = [
        'name' => 'required|string|max:20|min:4',
        'department' => 'required|string|max:20|min:4',
        'status' => 'required|string',

    ];
}
