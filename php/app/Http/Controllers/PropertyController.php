<?php

namespace App\Http\Controllers;

use App\Models\Property;

/** Готовый пример: список и карточка объектов только текущего тенанта. */
class PropertyController extends Controller
{
    public function index()
    {
        return Property::orderBy('id')->get(['id', 'title', 'price']);
    }

    public function show(Property $property)
    {
        return $property->only(['id', 'title', 'price']);
    }
}
