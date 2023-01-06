<?php

namespace App\Http\Controllers;

use App\Actions\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request
     * @return object
     */

    public function uploadImage(Request $request):object
    {
        $image = new Upload();
        $json_response = $image->Upload($request);
        return $json_response;
    }
}
