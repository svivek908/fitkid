<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $table = 'admins';
    protected $guarded = ['id'];

}
