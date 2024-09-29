<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvailabilityRequest; // Импортируем StoreAvailabilityRequest
use App\Http\Requests\UpdateAvailabilityRequest; // Импортируем UpdateAvailabilityRequest
use App\Models\Availability;

class AvailabilityController extends Controller
{
    public function index()
    {
        return Availability::all();
    }

    public function store(StoreAvailabilityRequest $request) // Используем StoreAvailabilityRequest
    {
        $validated = $request->validated();
        return Availability::create($validated);
    }

    public function show($id)
    {
        return Availability::findOrFail($id);
    }

    public function update(UpdateAvailabilityRequest $request, $id) // Используем UpdateAvailabilityRequest
    {
        $availability = Availability::findOrFail($id);
        $validated = $request->validated();
        $availability->update($validated);
        return $availability;
    }

    public function destroy($id)
    {
        $availability = Availability::findOrFail($id);
        $availability->delete();
        return response()->noContent();
    }
}
