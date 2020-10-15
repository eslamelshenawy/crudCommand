<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Value extends Model
{
  use SoftDeletes;
    protected $table = "values";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'average', 'area', 'squared'
    ];
}
