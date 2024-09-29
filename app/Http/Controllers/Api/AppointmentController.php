<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest; 
use App\Http\Requests\UpdateAppointmentRequest; 
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::all();
    }

    public function store(StoreAppointmentRequest $request) 
    {
        $validated = $request->validated();
        return Appointment::create($validated);
    }

    public function show($id)
    {
        return Appointment::findOrFail($id);
    }

    public function update(UpdateAppointmentRequest $request, $id) 
    {
        $appointment = Appointment::findOrFail($id);
        $validated = $request->validated();
        $appointment->update($validated);
        return $appointment;
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->noContent();
    }
}
