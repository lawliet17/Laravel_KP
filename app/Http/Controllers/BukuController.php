<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku=Buku::ambilSemua();
        $jumlah_buku=Buku::count();
        return view ('admin.bukuindex',['buku'=>$buku],['jumlah_buku=>$jumlah_buku']);
    }
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bukucreate');
    }

    /**buku.index
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis= $request->penulis;
        $buku->deskripsi= $request->deskripsi;
        $buku->save();
        Toastr::success('Data Berhasil Ditambahkan', 'Sukses', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $buku = Buku::ambil($id);
    //     return view ('admin.bukushow',['buku'=>$buku]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::ambil($id);
        return view ('admin.bukuedit',['buku'=>$buku]);
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

        $buku = Buku::ambil($id);

        $buku->judul = $request->judul;
        $buku->penulis= $request->penulis;
        $buku->deskripsi= $request->deskripsi;
        $buku->save();
        return redirect()->route('index',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku =Buku::find($id);
        $buku->delete();
        Toastr::error('Data Berhasil Dihapus', 'Sukses', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }
}
