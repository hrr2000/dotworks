<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name', 'icon', 'parent_id'];

    private static $iconPath = '';

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public static function getIconPath() : String {
        return self::$iconPath;
    }

    public function getIconUrl() : String {
        return url('storage' . '/' . self::getIconPath() . '/' . $this->icon);
    }

}
