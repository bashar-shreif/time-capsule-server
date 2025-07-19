<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\ModelService;

abstract class Controller
{
    protected static string $model;
    protected static array $required_fields;
    static function getAll($id = null)
    {
        $objects = ModelService::getAll($id, static::$model);
        return ResponseTrait::responseJSON($objects);
    }

}
