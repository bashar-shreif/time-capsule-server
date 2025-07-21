<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\Controller;
use App\Models\Capsule;
use ZipArchive;

class ZipController extends Controller
{
    public function exportZip($capsule_id)
    {
        $zip = new ZipArchive;
        $file_name = 'capsule' . $capsule_id . '.zip';
        $capsule = Capsule::find($capsule_id);
        $txt_file_path = ZipController::makeMessageTxt($capsule->message, $capsule_id);
        $zip->open(storage_path('app/public/zip/' . $file_name), ZipArchive::CREATE);
        $files = [
            $txt_file_path,
        ];
        $zip->addFile($files[0], basename(path: $files[0]));
        if ($capsule->media_url) {
            $files[] = $capsule->media_url;
            $zip->addFile($files[1], basename(path: $files[1]));
        }

        $zip->close();

        return response()->download(storage_path('app/public/zip/' . $file_name))->deleteFileAfterSend(true);

    }
    public function makeMessageTxt($message, $capsule_id)
    {
        $filePath = storage_path('app/public/messages/capsule_' . $capsule_id . '.txt');
        file_put_contents($filePath, $message);
        return $filePath;
    }
}