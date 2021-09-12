<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
	/**
     * Update document to S3.
     *
     * @param  Request  $request
     * @return Response
     */
    public function uploadFile(Request $request) {
    	try {
			$file = $request->file('document');
			$name= uniqid() . '.' . $file->getClientOriginalExtension();
			$filePath = 'documents/' . $name;
			$disk = Storage::disk('s3')->put($filePath, file_get_contents($file));            
            return response()->json('File successfully uploaded');
    	}
    	catch(\Exception $e) {
			return response()->json('Something went wrong');
    	}
    }
    public function getFiles() {
        $directory = 'documents';
		$files = Storage::allFiles($directory);
		
		$directory = 'documents';
		$files = Storage::disk('s3')->allFiles($directory);
		$url = [];
		
		if (!empty ($files)) {
			foreach ($files as $file) {
			$url[] = Storage::cloud()->url($file);
			}
		}
		return view('list-files')
			->with('names', $url);

    }
	
	
}
