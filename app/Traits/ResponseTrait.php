<?php

namespace App\Traits;

trait ResponseTrait
{
    static function responseJSON($payload, $status = "success", $status_code = 200)
    {
        return response()->json([
            "status" => $status,
            "payload" => $payload
        ], $status_code);
    }
    static function responseDownload($file_name)
    {
        response()->download(storage_path('app/public/zip/' . $file_name))->deleteFileAfterSend(true);
    }
}
