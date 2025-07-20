<?php
namespace App\Services\Common;

class MediaService
{
    public static function addMedia($base64)
    {
        $parts = explode(",", $base64);
        $imageData = base64_decode($parts[]);

    }
}










//Source
//https://www.blazingcoders.com/blog/convert-base64-data-to-image-file-and-write-to-folder-in-php.html
