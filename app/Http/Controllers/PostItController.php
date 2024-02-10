<?php

namespace App\Http\Controllers;

use App\Models\PostIt;
use Illuminate\Http\Request;

class PostItController extends Controller
{
    public function index()
    {
        $postIts = PostIt::all();
        return view('post-its.index', compact('postIts'));
    }

    public function create()
    {
        return view('post-its.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        PostIt::create($request->all());

        return redirect()->route('post-its.index')
            ->with('success', 'Post-It creado exitosamente.');
    }

    public function show(PostIt $postIt)
    {
        return view('post-its.show', compact('postIt'));
    }

    public function edit(PostIt $postIt)
    {
        return view('post-its.edit', compact('postIt'));
    }

    public function update(Request $request, PostIt $postIt)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $postIt->update($request->all());

        return redirect()->route('post-its.index')
            ->with('success', 'Post-It actualizado exitosamente.');
    }

    public function destroy(PostIt $postIt)
    {
        $postIt->delete();

        return redirect()->route('post-its.index')
            ->with('success', 'Post-It eliminado exitosamente.');
    }
}
