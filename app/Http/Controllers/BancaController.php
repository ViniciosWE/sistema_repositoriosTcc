<?php

namespace App\Http\Controllers;

use App\Models\Banca;
use App\Http\Requests\StoreBancaRequest;
use App\Http\Requests\UpdateBancaRequest;

class BancaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bancas = Banca::all(); 
        return view('bancas.create', compact('bancas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBancaRequest $request)
    {
        Banca::create($request->all());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banca $banca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banca $banca)
    {
        $bancas = Banca::all();
        return view('bancas.create', compact('banca', 'bancas')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBancaRequest $request, Banca $banca)
    {
        $banca->update($request->all());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banca $banca)
    {
        $banca->delete();
        return redirect('/');
    }
}
