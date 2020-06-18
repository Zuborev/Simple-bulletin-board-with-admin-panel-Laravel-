<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'title', 'text', 'image', 'user_id', 'category_id', 'created_at', 'updated_at', 'deleted_at'];

    protected $table = 'ads';

    public function category()
    {
        return $this->belongsTo(Category::Class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }

}
