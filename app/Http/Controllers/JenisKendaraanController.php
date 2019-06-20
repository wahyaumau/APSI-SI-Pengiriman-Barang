<?php

namespace App\Http\Controllers;

use App\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listJenisKendaraan = JenisKendaraan::paginate(20);        
        return view('jenis_kendaraan.index', compact('listJenisKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_kendaraan.create');
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
            'nama_jenis' => 'required|max:255',
            'kapasitas' => 'required'
        ));        

        $jenisKendaraan = new JenisKendaraan;        
        $jenisKendaraan->nama_jenis = $request->nama_jenis;
        $jenisKendaraan->kapasitas = $request->kapasitas;        
        $jenisKendaraan->save();                
        return redirect()->route('jenis_kendaraan.index')->with('success', 'Jenis Kendaraan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKendaraan $jenisKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKendaraan $jenisKendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKendaraan $jenisKendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKendaraan $jenisKendaraan)
    {
        //
    }
}
