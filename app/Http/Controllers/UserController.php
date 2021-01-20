<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{

    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('admin.pages.user.index', ['users' => $this->userRepository->paginate(5)]);
    }
    
    public function edit($id)
    {
            return view('admin.pages.user.edit',['user' => $this->userRepository->find($id)]);
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
        $this->userRepository->create((array)$request->all());
        return redirect()->route('users.index');
    }
    public function find(Request $request)
    {
      return view('admin.pages.user.index',['users' => $this->userRepository->findRegisterSimilar('name_user',$request->name_user)]);
    }
    public function update(EditUserRequest $request, $id)
    {
        $request = $request->except(['_token','_method']);
        $this->userRepository->update($request,$id, 'id_user');
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index');
    }

    public function makeLogin(LoginRequest $request)
    {
        $userByEmail = $this->userRepository->findByOneRegister('email_user', $request->email_user);
        if (isset($userByEmail->id_user)) {
            $auth =  password_verify($request->password_user, $userByEmail->password_user);
            if ($auth) {
                $request->session()->regenerate();
                Auth::login($userByEmail);
                return redirect('/dashboard/main');
            }         
        }
        return view('admin.startPages.login', ['login_failed' => '1']);
    }
    
    public function logout()
    {
        Auth::check() ? Auth::logout() : 0 ;
        return redirect('/');
    } 
    public function pageMain()
    {
        return view('admin.pages.main');
    }
}
