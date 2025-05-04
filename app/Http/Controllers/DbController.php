<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class DbController extends Controller
{
    function dbinp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'usr' => ['required','unique:users,username'],
            'em'=>['required','email','unique:users,email'],
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/','confirmed'],
        ],[
            'usr.unique'=>'Username already taken',
            'em.email'=>'Please Enter a valid email address',
            'em.unique'=>'Email already registered',
            'password.regex'=>'password must contain atleast 8 characters with 1 uppercase letter 1 lowercase letter 1 number and 1 special character',
            'password.confirmed'=>'password does not match',
        ]);
        if($validator->passes())
        {
            $inp=DB::table('users')->insert([
            "name"=>$request->name,
            "username"=>$request->usr,
            "email"=>$request->em,
            "password"=>password_hash($request->password,PASSWORD_BCRYPT),
            ]);

            if($inp)
            {
                return redirect('login');
            }
            else{
                die("data not inserted in database");
            }
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
