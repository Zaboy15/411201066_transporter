<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Lokasi;

class LokasiController extends Controller
{
    public function getLokasi(){
        $lokasi = Lokasi::orderBy("id", "desc")->get();
        return Helper::toJson($lokasi);
    }

    public function tambahLokasi(Request $request)
    {

        $lokasi = new Lokasi();
        $lokasi->kode_lokasi = $request->kode_lokasi;
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->save();

        return Helper::toJson($barang, "Data lokasi sudah ditambah");
        
    }

    public function ubahBarang(Request $request)
    {

        $barang = Barang::where("id", $request->id)->first();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->save();

        return Helper::toJson($barang, "Data lokasi sudah diubah");
        
    }

    public function hapusBarang($id)
    {

        $barang = Barang::where('id', $id)->first();
        Barang::where('id', $id)->delete();

        return Helper::toJson("", "Data lokasi sudah dihapus");
        
    }
    
}
