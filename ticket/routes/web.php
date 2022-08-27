<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\ContactController;
use App\Http\Controllers\Panel\DiscountController;
use App\Http\Controllers\Panel\EmailBoxController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\PaymentController;
use App\Http\Controllers\Panel\SearchController;
use App\Http\Controllers\Panel\TagController;
use App\Http\Controllers\Panel\TicketController;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('panel');
})->name('index');

Route::group(['middleware' => 'auth' ,'prefix' => "panel"],function(){
    Route::get('/',[HomeController::class, 'index'])->name('panel');
    Route::resource('users', UserController::class);
    Route::resource('tickets', TicketController::class);
    Route::get("tickets/create" , [TicketController::class , "createTicket"])->name("tickets.createTicket");
    Route::group(['middleware' => 'can:Admin'],function(){
        Route::post("tickets/changeStatus/{id}" , [TicketController::class , "changeStatus"])->name("tickets.changeStatus");
    });
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
