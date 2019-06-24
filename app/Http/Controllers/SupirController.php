<?php

namespace App\Http\Controllers;

use App\Supir;
use App\JenisSupir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSupir = Supir::paginate(20);        
        return view('supir.index', compact('listSupir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listJenisSupir = JenisSupir::all();
        return view('supir.create', compact('listJenisSupir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'nama_supir' => 'required|max:255',
            'alamat_supir' => 'required|max:255',
            'sim' => 'required|max:12',
        ));

        $supir = new Supir;        
        $supir->nama_supir = $request->nama_supir;        
        $supir->alamat_supir = $request->alamat_supir;        
        $supir->sim = $request->sim;        
        $supir->kode_jenis_supir = $request->kode_jenis_supir;        
        $supir->save();                
        return redirect()->route('supir.index')->with('success', 'Supir berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function show(Supir $supir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function edit(Supir $supir)
    {
        $listJenisSupir = JenisSupir::all();
        return view('supir.edit', compact('listJenisSupir', 'supir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supir $supir)
    {
        $this->validate($request, array(
            'nama_supir' => 'required|max:255',
            'alamat_supir' => 'required|max:255',
            'sim' => 'required|max:12',
        ));

        $supir->nama_supir = $request->nama_supir;
        $supir->alamat_supir = $request->alamat_supir;
        $supir->sim = $request->sim;
        $supir->kode_jenis_supir = $request->kode_jenis_supir;
        $supir->save();
        return redirect()->route('supir.index')->with('success', 'Supir berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supir $supir)
    {
        $supir->delete();
        return redirect()->route('supir.index')->with('success', 'Supir berhasil dihapus');    }
}
