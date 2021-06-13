<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use DB;
use \App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
class BukuController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // method untuk menampilkan data
    public function index(){
        $buku = DB::table('rak_buku')
        ->join('buku', 'buku.id', '=', 'rak_buku.id_buku')
        ->join('jenis_buku', 'rak_buku.id_jenis_buku', '=', 'jenis_buku.id')
        ->select('buku.judul', 'buku.tahun_terbit', 'jenis_buku.jenis')
        ->get();
        return view('buku0054', compact('buku'));
    }

    // method untuk mencari 
    public function carijoin(Request $request){
        $carijoin = $request->lihat;
        $buku = DB::table('buku')
        ->join('rak_buku', 'buku.id', '=', 'rak_buku.id_buku')
        ->join('jenis_buku', 'rak_buku.id_jenis_buku', '=', 'jenis_buku.id')
        ->select('rak_buku.id', 'buku.judul', 'jenis_buku.jenis' , 'buku.tahun_terbit')
        ->where('judul','like',"%".$carijoin."%")->paginate(1);
        return view('buku0054', compact('buku'));
    }

    // method untuk ekspor data excel
    public function export() 
    {
        return Excel::download(new BukuExport, 'Data_1461900054.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
