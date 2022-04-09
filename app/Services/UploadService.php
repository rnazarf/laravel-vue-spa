<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class UploadService
{
  public static function saveFile($file, $path)
  {
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move($path, $fileName);
    return $path . $fileName;
  }

  public static function updateFile($file, $path, $oldFile)
  {
    if ($file) {

      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->move($path, $fileName);
      $filePath = $path . $fileName;

      if ($oldFile) {
        self::deleteFile($oldFile);
      }

      return $filePath;
    } else {
      return $oldFile;
    }
  }

  public static function deleteFile($file)
  {
    File::delete(public_path($file));
    return true;
  }
}
