<?php

namespace App\Http\Controllers;

use App\Jobs\DocumentoJob;
use App\Repositories\CategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class DocumentsController extends Controller
{
    public $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function showForm()
    {
        return view('documento.upload');
    }

    public function handleUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:application/json|max:2048', // Adjust the allowed file types and size
        ]);

        // Handle the file upload
        $file = $request->file('file');
        $json = json_decode(file_get_contents($file), true);
        $validation = Validator::make($json['documentos'], [
            '*.category' => 'required',
            '*.contents'    => 'required|max:4000',
        ]);
         
        if ($validation->fails()) {
            return Response::make(['error' => $validation->errors()], 400);
        }

        foreach ($json['documentos'] as $value) {
            $category = $this->categoriesRepository->getByName($value['category']);
            if($category === null){
                continue;
            }
            $value["category_id"] = $category->id;
            DocumentoJob::dispatch($value);
        }

        return redirect()->route('upload.form')->with('success', 'File uploaded successfully');
    }

    public function process()
    {
        Artisan::call('queue:work', ['--sleep' => 3, '--tries' => 3]);

        return redirect()->route('upload.form')->with('success', 'successfully');
    }
}
