<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Topics;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index()
    {
        return Document::all();
    }
    public function getDocumentByTopic($id)
    {
        $documents = Document::where('idTopic', $id)->get();
        $documents = $documents->map(function ($document) {
            $document->topic = Topics::where('idTopic', $document->idTopic)->first();
            return $document;
        });
        return response()->json($documents);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('documents', $fileName);

            $document = new Document();
            $document->typeDocs = $request->input('typeDocs');
            $document->file = $fileName;
            $document->idTopic = $request->input('idTopic');
            $document->save();

            return response()->json(['document' => $document]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded']);
    }
    public function download($id)
    {
        $document = Document::find($id);
        if ($document) {
            $filePath = storage_path('\app\documents\\' . $document->file);

            if (file_exists($filePath)) {
                return response()->download($filePath, $document->file);
            }
        }

        return response()->json(['success' => false, 'message' => 'File not found']);
    }
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return response()->json($document);
    }
}
