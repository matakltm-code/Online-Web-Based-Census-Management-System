<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EnumeratorReportForSupervisor;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PublishController;
use App\Models\Publish;

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

Route::get('/', function () {
    $published_reoprt = Publish::latest()->first();
    // dd($published_reoprt);
    if ($published_reoprt != null) {
        return view('publish-welcome', [
            'published_reoprt' => $published_reoprt
        ]);
    } else {
        return view('welcome');
    }
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Profile route
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);
Route::get('/profile/change-password', [ChangepasswordController::class, 'index']);
Route::post('/profile/change-password', [ChangepasswordController::class, 'store']);

// Posts controller
// Route::resource('posts', [PostController::class]);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::patch('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);



// admin
Route::get('/account', [AccountController::class, 'index']);
Route::post('/account', [AccountController::class, 'store']);
Route::get('/account/users', [AccountController::class, 'all_users']); // also accessible in supervisor nav tab
Route::post('/account/enable-disable', [AccountController::class, 'enable_disable_account']);

Route::get('/supervisor-reports', [MessageController::class, 'view_report_from_supervisor']);
Route::get('/resident-feedbacks', [MessageController::class, 'view_feedback_from_resident']);

Route::get('/publish', [PublishController::class, 'index']);
Route::post('/publish', [PublishController::class, 'store']);

// supervisor
Route::get('enumerator-report', [EnumeratorReportForSupervisor::class, 'index']);
Route::get('generate-report', [EnumeratorReportForSupervisor::class, 'total_report_in_my_region']);
// Route::get('enumerator-report/{enumerator}', [EnumeratorReportForSupervisor::class, 'show']);

Route::get('send-report', [MessageController::class, 'send_report_for_admin']);
Route::post('send-report', [MessageController::class, 'store_send_report_for_admin']);




// enumerator
Route::get('/houses', [HouseController::class, 'index']);
Route::get('/houses/create', [HouseController::class, 'create']);
Route::post('/houses', [HouseController::class, 'store']);
Route::get('/houses/{house}', [HouseController::class, 'show']);

Route::get('/houses/{house}/add-memeber/{memeberType}', [HouseController::class, 'add_memeber']);
Route::post('/houses/add-alive-memeber', [HouseController::class, 'store_alive']);
Route::post('/houses/add-deceased-memeber', [HouseController::class, 'store_deceased']);

Route::get('/houses/{house}/edit', [HouseController::class, 'edit']);
Route::patch('/houses/{house}', [HouseController::class, 'update']);
Route::delete('/houses/{house}', [HouseController::class, 'destroy']);

// resident

Route::get('send-feedback', [MessageController::class, 'send_feedback_for_admin']);
Route::post('send-feedback', [MessageController::class, 'store_send_feedback_for_admin']);
