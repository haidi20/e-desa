<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supports\IndikatorPencapaian;

class DashboardController extends Controller
{
    function __construct(IndikatorPencapaian $ip){
        $this->ip = $ip;
    }

    public function index(){
        return view('dashboard.index');
    }

    public function ip(){
        $data = [
          ['nama' => 'IP 2.1'],
          ['nama' => 'IP 2.2'],
          ['nama' => 'IP 4.1'],
          ['nama' => 'IP 5.1'],
          ['nama' => 'IP 5.2'],
          ['nama' => 'IP 7.1'],
          ['nama' => 'IP 7.2'],
          ['nama' => 'IP 10.1'],
          ['nama' => 'IP 14.1'],
          ['nama' => 'IP 15.1'],
          ['nama' => 'IP 17.1'],
          ['nama' => 'IP 18.1'],
          ['nama' => 'IP 19.1'],
          ['nama' => 'IP 20.1'],
          ['nama' => 'IP 21.1'],
        ];

        return response()->json($data);
    }

    public function persen(){
        $duaSatu        = $this->ip->duaSatu();
        $duaDua         = $this->ip->duaDua();
        $empat          = $this->ip->empat();
        $limaSatu       = $this->ip->limaSatu();
        $limaDua        = $this->ip->limaDua();
        $tujuhSatu      = $this->ip->tujuhSatu();
        $tujuhDua       = $this->ip->tujuhDua();
        $sepuluh        = $this->ip->sepuluh();
        $empatBelas     = $this->ip->empatBelas();
        $limaBelas      = $this->ip->limaBelas();
        $tujuhBelas     = $this->ip->tujuhBelas();
        $delapanBelas    = $this->ip->delapanBelas();
        $sembilanBelas  = $this->ip->sembilanBelas();
        $duaPuluh       = $this->ip->duaPuluh();
        $duaPuluhSatu   = $this->ip->duaPuluhSatu();

        $data = [
            ['nama' =>'IP 2.1','isi' => $duaSatu],
            ['nama' => 'IP 2.2','isi' => $duaDua],
            ['nama' =>'IP 4.1','isi' => $empat],
            ['nama' => 'IP 5.1','isi' => $limaSatu],
            ['nama' =>'IP 5.2','isi' => $limaDua],
            ['nama' => 'IP 7.1','isi' => $tujuhSatu],
            ['nama' =>'IP 7.2','isi' => $tujuhDua],
            ['nama' => 'IP 10.1','isi' => $sepuluh],
            ['nama' => 'IP 14.1','isi' => $empatBelas],
            ['nama' => 'IP 15.1','isi' => $limaBelas],
            ['nama' => 'IP 17.1','isi' => $tujuhBelas],
            ['nama' => 'IP 18.1','isi' => $delapanBelas],
            ['nama' => 'IP 19.1','isi' => $sembilanBelas],
            ['nama' => 'IP 20.1','isi' => $duaPuluh],
            ['nama' => 'IP 21.1','isi' => $duaPuluhSatu]
        ];

        return response()->json($data);
    }
}
