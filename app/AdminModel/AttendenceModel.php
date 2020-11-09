<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class AttendenceModel extends Model
{
    protected $table = 'attendence';
    protected $guarded = ['id', 'created_at','updated_at'];
}
