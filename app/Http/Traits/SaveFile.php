<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;

trait SaveFile {
public function saveFile(Request $request,$fileName,$destinationPath)
{
      //return $request;
    if ($request->hasFile($fileName))
    {
        $file = $request->file($fileName);
        $name = time().'.'.$file->getClientOriginalExtension();

        $file->move($destinationPath, $name);
        return $name;
   }
}

}
