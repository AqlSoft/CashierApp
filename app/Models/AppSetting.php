<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $table = 'app_settings';
    protected $fillable = ['key_name', 'key_value', 'group_name', 'created_by', 'updated_by'];

    /**
     * Helper function to get a specific setting value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $setting = self::where('key_name', $key)->first();
        return $setting ? $setting->key_value : $default;
    }

    /**
     * Helper function to set a specific setting value.
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public static function set($key, $value): bool
    {
        $setting = self::where('key_name', $key)->first();

        if ($setting) {
            $setting->key_value = $value;
            return $setting->save();
        } else {
            return self::create(['key_name' => $key, 'key_value' => $value]);
        }
    }
}
