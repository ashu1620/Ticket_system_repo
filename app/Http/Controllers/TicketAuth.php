<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TicketAuth extends Controller
{
    public function inTicket(Request $request)
    {
        $author=auth()->user()->username;
        $assignee_detail=DB::table('users')->where('id',$request->assign)->first();
        $validator = validator($request->all(),[
            'title'=>('required'),
            'description'=>('required'),
            'status'=>'required',
            'assign'=>'required'
        ]);
        if($validator->passes())
        {
            $data= DB::table('tickets')->insert([
                'author_id'=>$author,
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'assignee_username'=>$assignee_detail->username,
                'assigned_to'=>$assignee_detail->name
            ]);
            if($data)
            {
                return redirect('dashboard');
            }
            else{
                die("data not inserted");
            }
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function assigneEdit(Request $request, $id)
    {
        $data= DB::table('tickets')->where('id',$id)->update([
            'status'=>$request->status,
        ]);
        if($data)
        {
            return redirect('myTickets');
        }
        else{
            die("data not inserted");
        }
    }
    public function myEdit(Request $request, $id)
    {
        $author=auth()->user()->username;
        $assignee_detail=DB::table('users')->where('id',$request->assign)->first();
        $validator = validator($request->all(),[
            'title'=>('required'),
            'description'=>('required'),
            'status'=>'required',
            'assign'=>'required'
        ]);
        if($validator->passes())
        {
            $data= DB::table('tickets')->where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'assignee_username'=>$assignee_detail->username,
                'assigned_to'=>$assignee_detail->name
            ]);
            if($data)
            {
                return redirect('dashboard');
            }
            else{
                die("data not inserted");
            }
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
