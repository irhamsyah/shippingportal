<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class News_image extends Model
{
  protected $table ='news_image';
  // protected $fillable = [
  //     'title', 'text', 'img_title', 'id_category', 'id_user'
  // ]
  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];

  Public $timestamps = true; //created_at dan update_at digunakan
}
