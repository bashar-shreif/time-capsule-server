<?php

namespace App\Services;

class ModelService
{
    static function getAll($id = null, $model)
    {
        return $id ? $model::find($id) : $model::all();
    }
    static function getId($model, $attribute)
    {
        $object = $model::where($attribute,"=", $model->$attribute)->first();
        return $object ? $object->id : null;
    }
}
