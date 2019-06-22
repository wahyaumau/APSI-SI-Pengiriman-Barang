<?php

namespace App\Http\Controllers;

use App\JenisSupir;
use Illuminate\Http\Request;

class JenisSupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listJenisSupir = JenisSupir::paginate(20);        
        return view('jenis_supir.index', compact('listJenisSupir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_supir.create');
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
            'nama_jenis_supir' => 'required|max:255',            
        ));        

        $jenisSupir = new JenisSupir;        
        $jenisSupir->nama_jenis_supir = $request->nama_jenis_supir;        
        $jenisSupir->save();                
        return redirect()->route('jenis_supir.index')->with('success', 'Jenis Supir berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisSupir  $jenisSupir
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSupir $jenisSupir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisSupir  $jenisSupir
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisSupir $jenisSupir)
    {
        return view('jenis_supir.edit', compact('jenisSupir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisSupir  $jenisSupir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisSupir $jenisSupir)
    {
        $this->validate($request, array(
            'nama_jenis_supir' => 'required|max:255'
        ));        
        
        $jenisSupir->nama_jenis_supir = $request->nama_jenis_supir; 
        $jenisSupir->save();                
        return redirect()->route('jenis_supir.index')->with('success', 'Jenis Supir berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisSupir  $jenisSupir
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisSupir $jenisSupir)
    {
        $jenisSupir->delete();
        return redirect()->route('jenis_supir.index')->with('success', 'kostan berhasil dihapus');
    }
}
