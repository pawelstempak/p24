<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Upload
{
    public function Upload(Request $request):object
    {
            $originName = $request->file('upload')->getClientOriginalName();
            
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            
            $extension = $request->file('upload')->getClientOriginalExtension();
            
            $newfileName = $fileName . '_' . time() . '.' . $extension;
            
            $request->file('upload')->storeAs('articles', $newfileName, 'oi');
            
            $url = Storage::disk('oi')->url('articles/'.$newfileName);

            return response()->json([
                'fileName' => $newfileName,
                'uploaded' => 1,
                'url' => $url
            ]);
    }
}