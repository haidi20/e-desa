<?php

namespace App\Supports;

use App\Models\File;

class FileManager
{
	public function __construct(File $file)
	{
		$this->file = $file;
	}

	public function uploadFile($files, $penduduk_id, $fungsi)
	{
        if($files){
    		$i = 0;
	        while($i < count($files)){
	        	$file = new $this->file;
	            $file->penduduk_id  = $penduduk_id;
	            $file->nama         = $this->getFileName($fileName[$i]);
	            $file->fungsi       = $fungsi;
	            $file->save();

	            $i++;
	        }
        }else{
        	return $beforeName;
        }
	}

	public function getFileName($files)
	{
		$extension      = $files->getClientOriginalExtension();
	    $fileName       = str_random(8) . '.' . $extension;
	    $files->move("storages/", $fileName);
	    return $fileName;
	}
}