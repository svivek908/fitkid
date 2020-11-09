<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $guarded = ['id', 'created_at','updated_at'];
}
