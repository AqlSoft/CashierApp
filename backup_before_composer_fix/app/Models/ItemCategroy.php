<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategroy extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'items_categories';
    protected $fillable = ['cat_name', 'cat_brief', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
