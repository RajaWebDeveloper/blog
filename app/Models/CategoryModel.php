<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategory(){
        return $this->hasMany(BlogModel::class,'category_model_id');
    }
}
