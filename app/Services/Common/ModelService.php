<?php

namespace App\Services\Common;

use App\Models\Mood;

class ModelService
{
    static function getAll($id = null, $model)
    {
        return $id ? $model::find($id) : $model::all();
    }
}
