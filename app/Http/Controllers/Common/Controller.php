<?php

namespace App\Http\Controllers\Common;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\Common\ModelService;

abstract class Controller
{
    protected static string $model;
    static function getAll($id = null)
    {
        $objects = ModelService::getAll($id, static::$model);
        return ResponseTrait::responseJSON($objects);
    }

}
