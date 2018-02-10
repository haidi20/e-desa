<?php

namespace App\Supports ;

// kebutuhan rumus
if ( ! function_exists('kondisi_sekolah') ) //kondisi untuk request sekolah maupun tidak
{
    function kondisi_sekolah($rumus){
        if (request('sekolah')) {
            return $rumus;
        }else{
            if ($rumus == 100) {
                return 1;
            }else{
                return 0;
            }
        }
    }
}

if ( ! function_exists('kondisi_jumlah_data') ) // kondisi apakah datanya 1 atau lebih dari 1
{
    function kondisi_jumlah_data($data){
        if (count($data) > 1) {
            return number_format((array_sum($data) / count($data)) * 100);
        }else{
            return array_sum($data);
        }
    }
}

if ( ! function_exists('kondisi_null') ) // kondisi datanya kosong atau tidak
{
    function kondisi_null($data){
        if ($data == null) {
            return 0;
        }else{
            return $data;
        }
    }
}
// end kubutuhan rumus
