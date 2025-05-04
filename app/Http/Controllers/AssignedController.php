<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AssignedController extends Controller
{
    public function myAssigned()
    {
        $userr=auth()->user()->username;
        $assignee_data=DB::table('tickets')->where('assignee_username',operator: $userr)->get();
        return view("myTickets",['assignees'=>$assignee_data]);
    }
}
