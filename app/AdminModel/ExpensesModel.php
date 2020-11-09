<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    protected $table = 'expenses';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
