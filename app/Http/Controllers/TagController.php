<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag;
        return view('tags.create', compact('tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tags',
            'user_id' => 'required'
        ]);

        Tag::create($request->all());
        return redirect()->route('tags.index')
                         ->with('success', 'Tag salva com sucesso!');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'title' => 'required|unique:tags',
            'user_id' => 'required'
        ]);
        
        $tag->update($request->all());
        return redirect()->route('tags.index')
                         ->with('success', 'Tag atualizada com sucesso!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')
                         ->with('success', 'Tag excluida com sucesso!');;
    }
}
