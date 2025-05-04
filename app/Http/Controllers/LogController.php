<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\error;
use function PHPUnit\Framework\returnArgument;

class LogController extends Controller
{
    function checkLogin(Request $request)
    {
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->psw]))
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back()->withErrors([
                'psw'=>'Incorrect username or password',
            ])->withInput();
        }
    }
    public function logOut()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}


