<?php

use App\Http\Controllers\AssignedController;
use App\Http\Controllers\LogController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\TicketAuth;
use Symfony\Component\Routing\Loader\Configurator\RouteConfigurator;

Route::view("/",'login');
Route::view("login",'login');
Route::post("dashboard",[LogController::class,"checkLogin"]);
Route::post("daash",[TicketAuth::class,"inTicket"]);
Route::post("login",[DbController::class,"dbinp"]);
Route::view("signup",'signup');
Route::get("/dashboard",[DashController::class,"usrData"])->name("dashboard");
Route::get("myTickets",[AssignedController::class,'myAssigned']);
Route::view("daash",'dashboard');
Route::get("create",[DashController::class,'dbData']);
Route::get("editTicket-{id}",[DashController::class,'editPass'])->name('editData');
Route::get("assignee-{id}",[DashController::class,'assigneEdit'])->name('assigneEdit');
Route::put("subEdit-{id}",[TicketAuth::class,'assigneEdit']);
Route::put("myEdit-{id}",[TicketAuth::class,'myEdit']);
Route::get("logout", [LogController::class,'logOut']);