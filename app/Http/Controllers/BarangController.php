<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBarang = Barang::paginate(20);        
        return view('barang.index', compact('listBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listSupplier = Supplier::all();
        return view('barang.create', compact('listSupplier'));
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
            'kode_barang' => 'required',
            'nama_barang' => 'required|max:255'
        ));        

        $barang = new Barang;
        $barang->kode_barang = $request->kode_barang; 
        $barang->nama_barang = $request->nama_barang; 
        $barang->satuan = $request->satuan;       
        $barang->harga = $request->harga;       
        $barang->stok = 0;       
        $barang->kode_supplier = $request->kode_supplier;               
        $barang->save();                
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $listSupplier = Supplier::all();
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, array(
            'kode_barang' => 'required',
            'nama_barang' => 'required|max:255'
        ));        
        
        $barang->kode_barang = $request->kode_barang; 
        $barang->nama_barang = $request->nama_barang; 
        $barang->satuan = $request->satuan;       
        $barang->harga = $request->harga;       
        $barang->stok = 0;       
        $barang->kode_supplier = $request->kode_supplier;               
        $barang->save();                
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
