<?php
namespace App\Services\Common;

class MediaService
{
    public static function addMedia($base64, $capsule_id)
    {
        $type = MediaService::getBase64Type($base64);
        $directory = MediaService::getFolder($type);
        $parts = explode(",", $base64, 2);
        $output_file = storage_path("app/public/media/" . $directory."file_for_capsule_".$capsule_id);
        $data = base64_decode(str($parts[1]));

        return file_put_contents($output_file, $data) ? $output_file : null;
    }
    public static function getFolder($raw_path)
    {
        $parts = explode("/", $raw_path);
        return $parts[0];
    }
    public static function getBase64Type(string $base64)
    {
        $types = [
            'image/jpeg' => 'image/',
            'image/png' => 'image/',
            'image/gif' => 'image/',
            'image/webp' => 'image/',
            'audio/mpeg' => 'audio/',
            'audio/wav' => 'audio/',
            'video/mp4' => 'video/',
            'application/pdf' => 'markdown/',
        ];
        if (preg_match('/^data:(.*);base64,/', $base64, $matches)) {
            $mime = $matches[1];
            return $types[$mime] ?? 'bin';
        }

        return null;
    }
}










//Source
//https://www.blazingcoders.com/blog/convert-base64-data-to-image-file-and-write-to-folder-in-php.html
