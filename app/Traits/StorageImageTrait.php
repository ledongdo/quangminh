<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

trait StorageImageTrait{
    public function storageTraiUpload($request,$fileldName,$foderName)
    {
        if($request->hasFile($fileldName)){
            $file = $request->$fileldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fileldName)->storeAs('public/'.$foderName . '/' . auth()->id(),$fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath) ,
            ];
        return $dataUploadTrait;

        }
        return null;
        
    }
    public function storageTraiUploadMutiple($file,$foderName)
    {
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20). '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$foderName . '/' . auth()->id(),$fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath) ,
            ];
        return $dataUploadTrait;
        
    }

}
?>