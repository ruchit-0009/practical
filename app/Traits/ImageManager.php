<?php
namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageManager {

    public function uploads($file, $path)
    {
        if($file) {
            $fileName   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = $path . $fileName;

            return $file = [
                'fileName' => $file_name,
                'fileType' => $file_type,
                'filePath' => $filePath,
            ];
        }
    }
     public function deleteImage($path){
        // dd($path);
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
          } 
     }

}