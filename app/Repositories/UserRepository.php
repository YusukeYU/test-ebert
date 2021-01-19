<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function findBy($column, $value)
    {
        return $this->user->where((string)$column, $value)->get();
    }
    public function makeLogin($request)
    {
        $user2 = $this->user->where('email_user', $request->email_user)->first();
        if (isset($user2->id_user)) {
            $auth = password_verify($request->password_user, $user2->password_user);
            if ($auth) {
                $request->session()->regenerate();
                Auth::login($user2);
                return redirect('/dashboard/main');
            }
        }
        return view('admin.startPages.login', ['login_failed' => '1']);
    }
    public function all()
    {
        return $this->user->paginate(5);
    }
    public function delete($id)
    {
         return $this->user->where('id_user',$id)->delete();
    }
    public function addUser($request)
    {
        $this->user->name_user = $request->name_user;
        $this->user->email_user = $request->email_user;
        $this->user->password_user = bcrypt($request->password_user);
        $this->user->admin_user = (int) $request->admin_user;
        $this->user->save();
    }
    public function setUpdate($request,$id)
    {
       $userNow = $this->user->find($id);
       $userNow->name_user = $request->name_user;
       $userNow->admin_user = (int) $request->admin_user;
       $userNow->save();
    }

}
