<?php

namespace App\Http\Controllers;

use App\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listGudang = Gudang::paginate(20);        
        return view('gudang.index', compact('listGudang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
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
            'nama_gudang' => 'required|max:255',
            'alamat_gudang' => 'required'
        ));        

        $gudang = new Gudang;        
        $gudang->nama_gudang = $request->nama_gudang;
        $gudang->alamat_gudang = $request->alamat_gudang;        
        $gudang->save();                
        return redirect()->route('gudang.index')->with('success', 'Data Gudang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gudang $gudang)
    {
        return view('gudang.edit', compact('gudang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gudang $gudang)
    {
        $this->validate($request, array(
            'nama_gudang' => 'required|max:255',
            'alamat_gudang' => 'required'
        ));        
        
        $gudang->nama_gudang = $request->nama_gudang;
        $gudang->alamat_gudang = $request->alamat_gudang;        
        $gudang->save();                
        return redirect()->route('gudang.index')->with('success', 'Gudang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gudang $gudang)
    {
        $gudang->delete();
        return redirect()->route('gudang.index')->with('success', 'Gudang berhasil dihapus');
    }
}
