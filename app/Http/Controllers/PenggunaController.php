<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Kecamatan;
use App\Models\pendidikan;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = User::kondisi()
                        ->paginate(10);

        return view('pengguna.index',compact('pengguna'));
    }

    public function create(){
        $pengguna   = User::paginate(10);

        $action     = route('pengguna.store');
        $method     = 'POST';

        return view('pengguna.form',compact('pengguna','action','method'));
    }

    public function store(){
        $pengguna = new User;

        $pengguna->nama       = request('nama');
        $pengguna->email      = request('email');
        $pengguna->sekolah_id = request('sekolah');
        $pengguna->password   = bcrypt(request('password'));
        $pengguna->save();

        return redirect()->route('pengguna.index');
    }

    public function reset(){
        return view('pengguna.reset');
    }

    public function konfirmasi(){
        return view('pengguna.konfirmasi');
    }
}
