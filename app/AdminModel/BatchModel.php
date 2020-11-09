<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class BatchModel extends Model
{
    protected $table = 'batch';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
