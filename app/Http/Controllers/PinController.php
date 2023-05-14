<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepinRequest;
use App\Http\Requests\UpdatepinRequest;
use App\Models\Pin;
use Carbon\Carbon;
use Inertia\Inertia;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $pins = Pin::where('user_id', $user->id)->latest()->get()->map(function ($pin) {
            return [
                'id' => $pin->id,
                'title' => $pin->title,
                'description' => $pin->description,
                'user_name' => $pin->User->name,
                'created_at' => $pin->created_at->format('D, d M Y')
            ];
        });
        return Inertia::render('Pins', [
            'pins' => $pins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepinRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();
        Pin::create([...$validated, 'user_id' => $user->id,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepinRequest  $request
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepinRequest $request, Pin $pin)
    {
        $user = auth()->user();
        if ($user->id == $pin->user_id) {
            $validated = $request->validated();
            $pin->update($validated);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pin  $pin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pin $pin)
    {
        $user = auth()->user();
        if ($user->id == $pin->user_id) {
            $pin->delete();
        }
    }
}
