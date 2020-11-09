<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ClassTypeModel extends Model
{
    protected $table = 'class_type';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
