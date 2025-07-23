<?php

namespace App\Http\Controllers\Common;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\Controller;
use App\Services\Common\ZipService;
use App\Models\Capsule;

class ZipController extends Controller
{
    public function exportZip($capsule_id)
    {
        $file_name = ZipService::export($capsule_id);
        return ResponseTrait::responseDownload($file_name);

    }
}