<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Services\RepositoryApi\GetAllService;
use App\Services\RepositoryApi\GetAllWithParamsService;
use App\Services\RepositoryApi\GetByIdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RepositoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $getAllService = new GetAllService();
        $repositories = $this->paginate($getAllService->get());
        return view('repositories.index', compact('repositories'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'term' => 'required',
        ]);
        
        $getAllWithParamsService = new GetAllWithParamsService();
        $repositories = $this->paginate($getAllWithParamsService->get($request)['items']);
        return view('repositories.index', compact('repositories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_id' => 'required|unique:repositories,tag_id,NULL,NULL,repository_id,'.$request['repository_id'],
            'repository_id' => 'required|unique:repositories,repository_id,NULL,NULL,tag_id,'.$request['tag_id'],
            'user_id' => 'required',
        ]);

        Repository::create($request->all());
        return redirect()->route('repositories.show', [
            'id' => $request->repository_id
        ])->with('success', 'Tag associada com sucesso!');
    }

    public function show($id)
    {
        $getByIdService = new GetByIdService();
        $repository = $getByIdService->get($id);
        $repositoryModel = new Repository();
        $tags = $repositoryModel->getTagsRegistered(Auth::id(), $id);

        return view('repositories.show', compact([
            'repository', 'tags'
        ]));
    }

    public function destroy($repository_id, $tag_id, $user_id)
    {
        $this->verifyUser($user_id);

        $repository = Repository::where('user_id', $user_id)
                                 ->where('repository_id', $repository_id)
                                 ->where('tag_id', $tag_id);

        $repository->delete();
    
        return redirect()->route('repositories.show', [
            'id' => $repository_id
        ])->with('success', 'Tag associada com sucesso!');
    }

    private function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator(
            $items->forPage($page, $perPage), 
            $items->count(), 
            $perPage, 
            $page, 
            $options
        );
    }

    private function verifyUser($userId)
    {
        if($userId != Auth::id())
        {
            return redirect()->route('repositories.index')
                             ->with('error', 'Você não tem permissão para isso');
        }
    }
}
