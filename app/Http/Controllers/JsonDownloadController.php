<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class JsonDownloadController extends Controller
{
    //
    public function showDownloadPage()
    {
        return view('jsonDownload.index');
    }

    public function downloadJson()
    {
        $filePath = storage_path("app/exports/user_comment_counts.json");

        if (!file_exists($filePath)) {
            return back()->withError('El archivo no existe.');
        }

        return response()->download($filePath);
    }
}
