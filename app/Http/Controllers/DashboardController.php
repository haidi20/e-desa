<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supports\IndikatorPencapaian;

class DashboardController extends Controller
{
    function __construct(IndikatorPencapaian $ip){
        $this->ip   = $ip;
    }

    public function index(){
        return view('dashboard.index');
    }

    public function pencapaian(){
        $data = $this->ip->duaDua(2);

        return response()->json($data);
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
        $duaSatu        = $this->ip->duaSatu(1);
        $duaDua         = $this->ip->duaDua(1);
        $empat          = $this->ip->empat(1);
        $limaSatu       = $this->ip->limaSatu(1);
        $limaDua        = $this->ip->limaDua(1);
        $tujuhSatu      = $this->ip->tujuhSatu(1);
        $tujuhDua       = $this->ip->tujuhDua(1);
        $sepuluh        = $this->ip->sepuluh(1);
        $empatBelas     = $this->ip->empatBelas(1);
        $limaBelas      = $this->ip->limaBelas(1);
        $tujuhBelas     = $this->ip->tujuhBelas(1);
        $delapanBelas    = $this->ip->delapanBelas(1);
        $sembilanBelas  = $this->ip->sembilanBelas(1);
        $duaPuluh       = $this->ip->duaPuluh(1);
        $duaPuluhSatu   = $this->ip->duaPuluhSatu(1);

        $data = [
            ['nama' =>'IP 2.1','isi'    => $duaSatu],
            ['nama' => 'IP 2.2','isi'   => $duaDua],
            ['nama' =>'IP 4.1','isi'    => $empat],
            ['nama' => 'IP 5.1','isi'   => $limaSatu],
            ['nama' =>'IP 5.2','isi'    => $limaDua],
            ['nama' => 'IP 7.1','isi'   => $tujuhSatu],
            ['nama' =>'IP 7.2','isi'    => $tujuhDua],
            ['nama' => 'IP 10.1','isi'  => $sepuluh],
            ['nama' => 'IP 14.1','isi'  => $empatBelas],
            ['nama' => 'IP 15.1','isi'  => $limaBelas],
            ['nama' => 'IP 17.1','isi'  => $tujuhBelas],
            ['nama' => 'IP 18.1','isi'  => $delapanBelas],
            ['nama' => 'IP 19.1','isi'  => $sembilanBelas],
            ['nama' => 'IP 20.1','isi'  => $duaPuluh],
            ['nama' => 'IP 21.1','isi'  => $duaPuluhSatu]
        ];

        return response()->json($data);
    }
}
