<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = User::kondisi()
                        ->paginate(10);

        return view('pengguna.index',compact('pengguna'));
    }

    public function create(){
        $pengguna = User::paginate(10);
        
        return view('pengguna.form',compact('pengguna'));
    }

    public function reset(){
        return view('pengguna.reset');
    }

    public function konfirmasi(){
        return view('pengguna.konfirmasi');
    }
}
