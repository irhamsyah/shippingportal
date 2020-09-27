<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Transaction extends Model
{
  protected $table ='transaction';
  protected $guarded = ['id'];

  Public $timestamps = false; //created_at dan update_at digunakan
}
