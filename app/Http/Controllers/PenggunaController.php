<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\User;
use App\Models\Sekolah;
use App\Models\Kecamatan;
use App\Models\pendidikan;

class PenggunaController extends Controller
{
    public function index(){
        $pengguna = User::kondisi()
                        ->paginate(10);

        return view('pengguna.index',compact(
            'pengguna'
        ));
    }

    public function create(){
        $pengguna   = User::paginate(10);
        $note       = request('note');

        if ($note) {
            return $note ;
        }

        return view('pengguna.form',compact('pengguna','note'));
    }

    public function store(){
        $penggunaFind             = User::where('sekolah_id',request('sekolah'))
                                        ->first();

        if ($penggunaFind) {
            $sekolah              = Sekolah::where('id',request('sekolah'))->first();
            $pengguna             = User::paginate(10);
            $note                 = 'akun sekolah '.$sekolah->nama.' sudah ada';

            return view('pengguna.form',compact('note','pengguna'));
        }else{
            $pengguna             = new User;
            $pengguna->nama       = $this->random();
            $pengguna->email      = request('email');
            $pengguna->sekolah_id = request('sekolah');
            $pengguna->password   = bcrypt($this->random());
            $pengguna->save();

            return redirect()->route('pengguna.index');
        }


    }

    public function destroy($id){
        $pengguna = User::find($id);
        $pengguna->delete();

        return redirect()->back();
    }

    public function random(){
        $random = 'SPM-'.substr(md5(microtime()),rand(1,26),4);
        return $random ;
    }

    public function reset(){
        return view('pengguna.reset');
    }

    public function konfirmasi(){
        return view('pengguna.konfirmasi');
    }
}
