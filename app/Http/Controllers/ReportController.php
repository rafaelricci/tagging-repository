<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;
use App\Models\Tag;
use App\Services\RepositoryApi\GetByIdService;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        return view('reports.index', compact('tags'));
    }

    public function repositories(Request $request)
    {
        $request->validate([
            'tag_id' => 'required',
        ]);

        $repositories = Repository::where('user_id', Auth::id())
                                       ->where('tag_id', $request->tag_id)
                                       ->get();
        $repositoriesResult = [];
        foreach($repositories as $repository)
        {
            $getByIdService = new GetByIdService();
            array_push($repositoriesResult, $getByIdService->get($repository->repository_id));
        }
        return view('reports.repositories', compact('repositoriesResult'));
    }
}
