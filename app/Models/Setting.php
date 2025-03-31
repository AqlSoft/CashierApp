<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  public $timestamps = true;

  protected $table = "general_setting";
  
  protected $fillable = [
    'id',
    'company_name',
    'tax_number',
    'commercial_registration',
    'phone',
    'logo',
    'created_by',
    'updated_by',
  ];
}
