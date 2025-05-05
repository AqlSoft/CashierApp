<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{
  public $timestamps = true;
  protected $table="units";

  protected $fillable = ['name', 'breif', 'short_name', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];

}
