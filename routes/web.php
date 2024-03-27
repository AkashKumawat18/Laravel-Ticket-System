<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
use \App\Models\User;

Route::get('/', function () {
    //return view('welcome');

//Create user
//    $user = DB::insert("insert into users (name,email,password) values (?,?,?)",
//        [
//            'akash2',
//            'akash2@gmail.com',
//            'password']);

    //update a user
    //$affected = DB::update("update users set email = 'akash2@gmail.com' where name=?",['akash2']);

    //$users = DB::select("select * from users");

   // $users = DB::table('users')->get();

//    $user = DB::table('users')->pluck('email');
//    $user = DB::table('users')->insert([
//        'name'=>'akash3',
//        'email'=>'akash3@gmail.com',
//        'password'=>'password'
//    ]);
//    $user = DB::table('users')->where('id',3)->update([
//        'email'=>'test1@gmail.com'
//    ]);
// $user = DB::table('users')->where('id',3)->delete();

    //Using Eloquent method

    //Read
    //$users = User::all();
    //$user = User::findorfail(1)->count();

    //insert
//    $user = User::create([
//        'name'=>'akash3',
//        'email'=>'akash3@gmail.com',
//        'password'=>'password'
//    ]);

    //Update
 //$user = User::find(4);
// $updatedUser = $user->update([
//     "email"=>"test@gmail.com"
// ]);

    //Delete
    //$deletedUser = $user->delete();

    //raw
//    $user = DB::insert("insert into users(name,email,password) value(?,?,?)",[
//        "akash1",
//        "akash1@gmail.com",
//        "password"
//    ]); =

    //query
//    $user = DB::table('users')->insert([
//        'name'=>'akash2',
//        'email'=>'akash2@gmail.com',
//        'password'=>'password'
//    ]);

    //eloquent
    $user = User::create([
                'name'=>'akash3',
        'email'=>'akash3@gmail.com',
        'password'=>'password'
    ]);

    dd($user);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
