<?php

namespace App\Services;

class ModelService
{
    static function getAll($id = null, $model)
    {
        return $id ? $model::find($id) : $model::all();
    }
}
