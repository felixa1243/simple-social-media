<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function serve(Request $request)
    {
        // return response()->json(["message" => $request->filename]);
        // Define the path to the file in private storage
        $filePath = storage_path("app/private/{$request->filename}");

        // // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file as a response with the correct headers
            return response()->file($filePath);
        }

        // Return a 404 error if the file doesn't exist
        return abort(404, 'File not found');
    }
}
