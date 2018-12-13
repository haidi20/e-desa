<?php 

use Carbon\Carbon;

if( ! function_exists('terpilih') )
{
	function terpilih($parm1, $parm2){
		return $parm1 == old($parm2) ? 'selected' : '' ;
	}
}

if( ! function_exists('format_tanggal') )
{
	function format_tanggal($date){

        $day      = Carbon::parse($date)->format('d');
        $month    = Carbon::parse($date)->format('n');
        $year     = Carbon::parse($date)->format('Y');

        return $year.'-'.$month.'-'.$day;
	}
}