<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function usrData()
    {
        $user=auth()->user()->username;
        $dashData= DB::table('tickets')->where('author_id',$user)->get();
        return view("dashboard",['dash'=>$dashData]);
    }
    public function dbData()
    {
        $rem_usr=auth()->user()->id;
        $userData= DB::table('users')->where('id','!=',$rem_usr)->get();
        return view('create',['userData'=>$userData]);
    }

    public function editPass($id){
        $rem_usr=auth()->user();
        $userData= DB::table('users')->where('id','!=',$rem_usr->id)->get();
        $ticket= DB::table('tickets')->where('id',$id)->first();
        if($rem_usr->username == $ticket->author_id)
        {
            return view('edit',compact('ticket','userData'));
        }
        else
        {
            die("cannot show other user's ticket");
        }
    }
    public function assigneEdit($id){
        $rem_usr=auth()->user();
        $userData= DB::table('users')->where('id','!=',$rem_usr->id)->get();
        $ticket= DB::table('tickets')->where('id',$id)->first();
        if($rem_usr->username == $ticket->assignee_username)
        {
            return view('assignEdit',compact('ticket','userData'));
        }
        else
        {
            die("You cannot access this ticket as it is not assigned you");
        }
    }
}
