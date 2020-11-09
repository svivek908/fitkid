<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
