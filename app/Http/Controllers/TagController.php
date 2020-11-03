<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())->paginate(10);
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
        $this->verifyUser($tag);

        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->verifyUser($tag);

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
        $this->verifyUser($tag);

        $tag->delete();
        return redirect()->route('tags.index')
                         ->with('success', 'Tag excluida com sucesso!');
    }

    public function getTags()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        return response()->json($tags);
    }

    private function verifyUser($tag)
    {
        if($tag->user_id != Auth::id())
        {
            return redirect()->route('tags.index')
                             ->with('error', 'Você não tem permissão para isso');
        }
    }
}
