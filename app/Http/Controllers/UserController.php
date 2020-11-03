<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->verifyUser($user);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->verifyUser($user);

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());
        return redirect()->route('users.show',['user' => $user])
                         ->with('success', 'Perfil atualizad com sucesso!');;
    }

    public function destroy(User $user)
    {
        $this->verifyUser($user);

        $user->delete();
        return redirect()->route('home')
                         ->with('success', 'Caso queira, pode se recadastrar, é de graça :D');
    }

    private function verifyUser($user)
    {
        if($user->id != Auth::id())
        {
            return redirect()->route('home')
                             ->with('error', 'Você não tem permissão para isso');
        }
    }
}
