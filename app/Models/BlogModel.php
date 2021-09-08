<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCreatedAtAttribute( $value ) {
        return date("d F Y", strtotime($value));
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function comment()
    {
        return $this->hasMany(CommentModel::class,'blog_model_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'category_model_id');
    }
}
