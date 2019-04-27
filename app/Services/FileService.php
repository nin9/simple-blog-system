<?php

namespace App\Services;

use Storage;

class FileService {

    public static function saveFile($file, $folder=''){
        $file_name = $file->getClientOriginalName();
        
        if(Storage::disk('public')->put($folder.'/'.$file_name, file_get_contents($file)))
            return Storage::url($folder.'/'.$file_name);
    }
}