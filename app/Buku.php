<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $table = "buku";
    protected $fillable = ["judul" , "pengarang" , "kategori" , "tahunTerbit" , "penerbit"];
}
