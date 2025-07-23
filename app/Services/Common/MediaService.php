<?php
namespace App\Services\Common;

class MediaService
{
    public static function addMedia($base64, $capsule_id = "", $name)
    {
        $mimeType = MediaService::getBase64MimeType($base64); // new helper
        $directory = MediaService::getFolder($mimeType);
        $parts = explode(",", $base64, 2);

        $extension = explode('/', $mimeType)[1] ?? 'bin';
        $fileName = "file_for_" . $name . $capsule_id . "." . $extension;
        $relativePath = "media/" . $directory . $fileName;

        $outputPath = storage_path("app/public/" . $relativePath);

        $data = base64_decode($parts[1]);
        file_put_contents($outputPath, $data);

        return "/storage/" . $relativePath;

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
    public static function getBase64MimeType(string $base64)
    {
        if (preg_match('/^data:(.*);base64,/', $base64, $matches)) {
            return $matches[1];
        }
        return 'application/octet-stream';
    }

}










//Source
//https://www.blazingcoders.com/blog/convert-base64-data-to-image-file-and-write-to-folder-in-php.html
