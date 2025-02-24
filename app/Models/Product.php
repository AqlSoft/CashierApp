<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Product extends Model
{
  public $timestamps = true;
  protected $table = "products";

  protected $fillable = ['name', 'cost_price', 'quantity', 'description', 'status','category', 'created_at', 'created_by', 'updated_by', 'updated_at'];

  public function creator()
  {
      return $this->belongsTo(Admin::class, 'created_by', 'id');
  }
  public function editor()
  {
      return $this->belongsTo(Admin::class, 'updated_by', 'id');
  }

}
