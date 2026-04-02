<?php

namespace App\Http\Controllers;

use App\Models\Tcc;
use App\Models\Banca;
use App\Http\Requests\StoreTccRequest;
use App\Http\Requests\UpdateTccRequest;
use Illuminate\Support\Facades\Storage;

class TccController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tccs = Tcc::with(['banca1', 'banca2'])->latest()->get();
        return view('welcome', compact('tccs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bancas = Banca::all();
        return view('tccs.create', compact('bancas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTccRequest $request)
    {
        $dados = $request->all();
        if ($request->hasFile('arquivo_pdf')) {
            $path = $request->file('arquivo_pdf')->store('tccs', 'public');
            $dados['arquivo_pdf'] = $path;
        }

        Tcc::create($dados);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tcc $tcc)
    {
        $tcc->load(['banca1', 'banca2']);
        return view('tccs.show', compact('tcc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tcc $tcc)
    {
        $bancas = Banca::all();
        return view('tccs.create', compact('tcc', 'bancas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTccRequest $request, Tcc $tcc)
    {
        $dados = $request->all();

        if ($request->hasFile('arquivo_pdf')) {
            if ($tcc->arquivo_pdf) {
                Storage::disk('public')->delete($tcc->arquivo_pdf);
            }
            $dados['arquivo_pdf'] = $request->file('arquivo_pdf')->store('tccs', 'public');
        }

        $tcc->update($dados);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tcc $tcc)
    {
        if ($tcc->arquivo_pdf) {
            Storage::disk('public')->delete($tcc->arquivo_pdf);
        }

        $tcc->delete();

        return redirect('/');
    }
}
