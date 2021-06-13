<?php

namespace App\Exports;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $buku = DB::table('rak_buku')
        ->join('buku', 'buku.id', '=', 'rak_buku.id_buku')
        ->join('jenis_buku', 'rak_buku.id_jenis_buku', '=', 'jenis_buku.id')
        ->select('rak_buku.id', 'buku.judul', 'buku.tahun_terbit', 'jenis_buku.jenis')
        ->get();
        return $buku;
    }
}
