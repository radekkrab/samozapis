<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialistRequest; // Импортируем StoreSpecialistRequest
use App\Http\Requests\UpdateSpecialistRequest; // Импортируем UpdateSpecialistRequest
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function index()
    {
        return Specialist::all();
    }

    public function store(StoreSpecialistRequest $request) // Используем StoreSpecialistRequest
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        return Specialist::create($validated);
    }

    public function show($id)
    {
        return Specialist::findOrFail($id);
    }

    public function update(UpdateSpecialistRequest $request, $id) // Используем UpdateSpecialistRequest
    {
        $specialist = Specialist::findOrFail($id);
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $specialist->update($validated);
        return $specialist;
    }

    public function destroy($id)
    {
        $specialist = Specialist::findOrFail($id);
        $specialist->delete();
        return response()->noContent();
    }
}
