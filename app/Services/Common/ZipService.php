<?php

namespace App\Services\Common;

use ZipArchive;


class ZipService
{
    static function export($capsule_id)
    {
        $zip = new ZipArchive;
        $capsule = Capsule::find($capsule_id);
        $file_name = 'capsule' . $capsule_id . '.zip';
        $txt_file_path = ZipService::makeMessageTxt($capsule->message, $capsule_id);

        if (!$zip->open(storage_path('app/public/zip/' . $file_name), ZipArchive::CREATE))
            return null;

        $zip->addFile($txt_file_path, basename(path: $txt_file_path));
        $media_url = $capsule->media_url;
        if ($media_url)
            $zip->addFile($media_url, basename(path: $media_url));

        $zip->close();
        return $file_name;
    }
    static function makeMessageTxt($message, $capsule_id)
    {
        $filePath = storage_path('app/public/messages/capsule_' . $capsule_id . '.txt');
        file_put_contents($filePath, $message);
        return $filePath;
    }
}
