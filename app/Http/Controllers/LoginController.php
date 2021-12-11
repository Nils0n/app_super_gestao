<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

        return view('site.login', ['titulo' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $rules = [
            'login' => 'email',
            'password' => 'required'
        ];

        $messages = [
            'login.email' => 'O login é obrigatorio e tem que ser um email',
            'password.required' => 'Senha é obrigatório'
        ];

        $request->validate($rules , $messages);
        $user = User::where('email' , $request->login)->where('password' , $request->password)->first();

        if(isset($user)){
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        }else{
            return back()->withErrors(['errors' => 'usuário inválido']);
        }

        return 'miau';
    }

    public function exit(){
        session_destroy();

        return redirect()->route('site.index')->with('success', 'Logout efetuado com sucesso!');
    }
}
