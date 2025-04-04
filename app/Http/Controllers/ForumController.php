<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forum = Forum::all();

        return view('forum.index', [
            'forum' => $forum
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required_without:title_fr|max:100',
            'content_en' => 'required_without:content_fr',
            'title_fr' => 'required_without:title_en|max:100',
            'content_fr' => 'required_without:content_en',
        ]);
        // Took the idea from the SetLocale! 
        $forum = Forum::create([
            "title_en" => $request->title_en ?? '', 
            "content_en" => $request->content_en ?? '',
            "title_fr" => $request->title_fr ?? '', 
            "content_fr" => $request->content_fr ?? '',
        ]);

        return redirect()->route('forum.index', $forum->id)->with('success', 'Forum created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forum = Forum::all($id);

        return view('forum.show', [
            'forum' => $forum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $forum = Forum::find($id);

        return view("forum.edit", ['forum' => $forum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $forum = Forum::find($id);
        $forum->update([
            "title" => $request->title,
            "content" => $request->content,
        ]);

        return redirect()->route('forum.show')->with('success', 'Forum updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $forum = Forum::find($id);
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Forum deleted successfully.');
    }
}
