<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Timezone extends Model
{
    //
    protected $table = 'timezones';
    protected $fillable = [
        'name_ar',
        'name_en',
        'tz_value',
        'tz_group',
    ];

    public function getNameAttribute() 
    {
        return App::getLocale() == 'ar' ? $this->name_ar : $this->name_en;
    }
}
