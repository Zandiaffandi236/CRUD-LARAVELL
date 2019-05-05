<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Buku::latest()->paginate(8);
        return view('buku.index' , compact('book'))
                    ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            "judul"         =>  "required",
            "pengarang"     =>  "required",
            "kategori"      =>  "required",
            "tahunTerbit"   =>  "required",
            "penerbit"      =>  "required"
        ]);

            Buku::create($request->all());
            return redirect()->route('buku.index')
                            ->with('success' , 'Data Buku Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Buku::find($id);
        return view('buku.edit' , compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            "judul"         =>  "required",
            "pengarang"     =>  "required",
            "kategori"      =>  "required",
            "tahunTerbit"   =>  "required",
            "penerbit"      =>  "required"
        ]);
        $book = Buku::find($id);
        $book->judul = $request->get('judul');
        $book->pengarang = $request->get('pengarang');
        $book->kategori = $request->get('kategori');
        $book->tahunTerbit = $request->get('tahunTerbit');
        $book->penerbit = $request->get('penerbit');
        $book->save();
        return redirect()->route('buku.index')->with('success' , 'Data Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Buku::find($id);
        $book->delete();
        return redirect()->route('buku.index')->with('success' , 'Data Buku Berhasil Dihapus');
    }
}
