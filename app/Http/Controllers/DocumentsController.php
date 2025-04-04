<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('user')->paginate(10);
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,zip,doc,docx',
        ]);

        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('documents', $fileName, 'public');

        Document::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $file->getClientOriginalExtension(),
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:pdf,zip,doc,docx|max:10240',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /*  $document = Document::all($id);
        $document->delete(); */
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }

    public function download(string $id)
    {

    }
}
