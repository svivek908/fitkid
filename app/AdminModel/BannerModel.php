<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'banners';
    protected $guarded = ['id', 'created_at', 'updated_at'];

 //    public function category()
	// {
	//     return $this->hasMany('App\AdminModel\CategoryModel');
	// }

	// public function categories()
	// {
	//     return $this->hasMany('App\AdminModel\CategoryModel', 'id');
	// }

    // public function category()
    // {
    //     return $this->hasMany('App\AdminModel\CategoryModel', 'main_cate_id');
    // }
}
