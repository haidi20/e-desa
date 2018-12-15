<?php

namespace App\Supports;

class FileManager
{
	public function uploadFile($file, $namaSebelumnya)
	{
        @unlink(public_path('storages/' . $namaSebelumnya));
        $extension      = $file->getClientOriginalExtension();
        $fileName       = str_random(8) . '.' . $extension;
        request()->file('file')->move("storages/", $fileName);
        return $fileName;
	}
}