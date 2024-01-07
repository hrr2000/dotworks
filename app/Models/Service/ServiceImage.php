<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ServiceImage extends Model
{
    protected $table = 'service_images';

    private static $path = 'services/';

    protected $fillable = ['name'];

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public static function generateRecordName(UploadedFile $image): string
    {
        return 'service_image_'. auth()->user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
    }

    public static function path()
    {
        return self::$path;
    }


    public static function getUrl(string $imgName)
    {
        return Storage::url(self::path() . $imgName);
    }

    public function url()
    {
        return self::getUrl($this->name);
    }

}
