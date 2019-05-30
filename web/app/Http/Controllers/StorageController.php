<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class StorageController extends Controller
{
    /**
     * Get image
     *
     * @return File 
     */
    public function index($path, $filename)
    {
        $path = storage_path('app/'.$path.'/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
