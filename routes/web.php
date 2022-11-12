<?php

use App\Events\MessageCreated;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PusherController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes(['register' => false]);











// Route::get('/a/{id?}',[MessengerController::class,'index'])->middleware('auth')->name('messenger');



Route::get('as',function(){
    return response()->json(['status'=>0,'message'=>'you shoud login']);
})->name('jsonResponse');


Route::view('/','messenger')->name('tt')->middleware('auth:sanctum');
// Route::view('aa','messenger_copy');
// Route::view('we','welcome');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/broadcasting/auth', [PusherController::class, 'pusherAuth'])


Route::post('reg', function (Request $request)
{
    $deviceToken=$request->deviceToken;
    if($deviceToken==null){
        $deiviceToken='null';
    }
    
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'deviceToken'=>$deviceToken,
        'img' =>'https://ui-avatars.com/api/?background=2787F5&color=fff&name='.$request->name
    ]);
    return redirect()->route('login');
})->name('register1');
Route::view('register','auth.register')->name('register')->middleware('https');