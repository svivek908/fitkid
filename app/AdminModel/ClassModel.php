<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
