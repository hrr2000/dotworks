<?php

namespace App\Models\Service;

use App\Models\User\User;
use App\Models\Service\ServicePackage;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

        protected $fillable=['title', 'overview', 'description', 'guarantee', 'price', 'category_id', 'user_id'];

        public function provider(){
            return $this->belongsTo(User::class,'user_id');
        }

        public function category(){
            return $this->belongsTo(Category::class,'category_id');
        }

        public function state(){
            return $this->belongsTo(ServiceState::class,'state_id');
        }

        public function images(){
            return $this->hasMany(ServiceImage::class);
        }

        public function packages(){
            return $this->hasMany(ServicePackage::class);
        }

        public static function getImagesPath(){
            return ServiceImage::path();
        }


}
