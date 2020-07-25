<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class News extends Model
{
  protected $table ='news';
  protected $fillable = [
      'title', 'text', 'img_title', 'id_category', 'id_user', 'created_at', 'updated_at', 'deleted_at'
  ];
  protected $dates = ['deleted_at'];

  Public $timestamps = true; //created_at dan update_at digunakan
}
