<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentModel extends Authenticatable
{
    protected $table = 'students';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
