<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ressource::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = ResponseController::validation($request,
            [
                'name' => 'required',
                'lien' => 'required',
            ],
        );
        if ($validated) {
            return $validated;
        }


        Ressource::create($validated);

        return response()->json(['message' => 'Ressource created'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
        return $ressource;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        //
    }
}
