<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $id;
    protected $judul;
    protected $penulis;
    protected $deskripsi;

    // index
    public static function ambilSemua()
    {
    return self::all();
    }

    // show
    public static function ambil($id)
    {
    return self::find($id);
    }

    //delete
    public static function hapus($id)
    {
    $this->find($id);
    return self::delete($id);
    }
}
