<?php

namespace App\Supports;

Class DetailIP
{
    public function kondisiSekolah($data,$nama){ // kondisi untuk request sekolah maupun tidak
        if (request('sekolah')) {
            if ($data == 100) {
                $detail = ['nama' => $nama, 'status' => 'lolos'] ;
            }else{
                $detail = ['nama' => $nama, 'status' => 'tidak'] ;
            }
        }else{
            if ($data == 1) {
                $detail = ['nama' => $nama, 'status' => 'lolos'] ;
            }else{
                $detail = ['nama' => $nama, 'status' => 'tidak'] ;
            }
        }
        return $detail;
    }

    public function kondisiSekolahBanyak($data,$nama){ // kondisi untuk request sekolah maupun tidak
        foreach ($nama as $index => $item) {
            if (request('sekolah')) {
                if ($data == 100) {
                    $detail[$index] = ['nama' => $item['nama'], 'status' => 'lolos'] ;
                }else{
                    $detail[$index] = ['nama' => $item['nama'], 'status' => 'tidak'] ;
                }
            }else{
                if ($data == 1) {
                    $detail[$index] = ['nama' => $item['nama'], 'status' => 'lolos'] ;
                }else{
                    $detail[$index] = ['nama' => $item['nama'], 'status' => 'tidak'] ;
                }
            }
        }
        return $detail;
    }

    public function kondisiJumlah($data){ // memilah sekolah sudah dan belum dan menghitung jumlah
        $belum = [];
        $sudah = [];

        foreach ($data as $index => $item) {
            if ($item['status'] == 'lolos') {
                $sudah[$index] = ['nama'=>$item['nama']];
            }else{
                $belum[$index] = ['nama'=>$item['nama']];
            }
        }

        $jumlahSudah = count($sudah);
        $jumlahBelum = count($belum);

        $detail = [
            'sudah' => $jumlahSudah, 'belum' => $jumlahBelum,
            'sekolahSudah' => $sudah, 'sekolahBelum' => $belum
        ];

        return $detail;
    }
}
