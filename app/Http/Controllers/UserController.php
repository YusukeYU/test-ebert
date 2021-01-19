<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('admin.pages.user.index',['users' =>$this->user->all()]);
    }

    public function create()
    {
        if(auth()->user()->admin_user == 1){
            return view('admin.pages.user.create');
        }
        else{
            return redirect()->route('users.index');
        }
        
    }

    public function store(StoreUserRequest $request)
    {
        $this->user->addUser($request);
        return redirect()->route('users.index');
    }


    public function find(Request $request)
    {
      return view('admin.pages.user.index',['users' => $this->user->findBy('name_user',$request->name_user)]);
    }

    public function edit($id)
    {
        if(auth()->user()->admin_user == 1){
            return view('admin.pages.user.edit',['user' => $this->user->find($id)]);
        }
        else{
            return redirect()->route('users.index');
        }
    }


    public function update(EditUserRequest $request, $id)
    {
        $this->user->setUpdate($request,$id);
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $this->user->delete($id);
        return redirect()->route('users.index');
    }

    public function makeLogin(LoginRequest $request)
    {
        return $this->user->makeLogin($request);
    }
    
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }
    public function pageMain(){
        return view('admin.pages.main');
    }
}
