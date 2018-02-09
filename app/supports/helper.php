<?php

// kebutuhan rumus
if ( ! function_exists('kondisi_sekolah') )
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

if ( ! function_exists('kondisi_jumlah_data') )
{
    function kondisi_jumlah_data($data){
        if (count($data) > 1) {
            return number_format((array_sum($data) / count($data)) * 100);
        }else{
            return array_sum($data);
        }
    }
}

if ( ! function_exists('kondisi_null') )
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
