<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulletin extends Model
{
    use SoftDeletes;

    protected $fillable =['id', 'title', 'text', 'image', 'user_id', 'category_id', 'created_at', 'updated_at', 'deleted_at'];

    protected $table = 'bulletins';

 /*   public function author()
          {
              return $this->belongsTo(User::Class, 'user_id');
          }
          public function categories()
          {
              return $this->belongsTo(NewsCategories::Class, 'categories_id');
          }
          */
}
