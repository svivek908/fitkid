<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    protected $table = 'video';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
