<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sekolah;
use App\Models\Kecamatan;

class KunciController extends Controller
{
    public function index(){
        $d_kecamatan = Kecamatan::all();
        $t_kecamatan = Kecamatan::kondisi()
                                ->paginate(10);

        return view('kunci.index',compact('d_kecamatan','t_kecamatan'));
    }

    public function detail(){
        $kecamatan = $this->kondisiKecamatan();

        $d_sekolah  = Sekolah::where('kecamatan_id',$kecamatan)->get();
        $t_sekolah  = Sekolah::kondisi()
                             ->paginate(10);

        // return session('kecamatan');

        return view('kunci.detail',compact('d_sekolah','t_sekolah'));
    }

    public function simpan(){
        return 'bisa simpan';
    }

    public function kondisiKecamatan(){
        if (request()->has('kecamatan')) {
            $kecamatan = request('kecamatan');
            session()->put('session',request('kecamatan'));
        }else{
            $kecamatan = session('kecamatan');
        }

        return $kecamatan;
    }
}
