<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///////////////////////////////////////////// users view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/users'         ,[App\Http\Controllers\Admin\UserController::class,'index'])          -> name('admin.users');
    Route::get('/user_create'        ,[App\Http\Controllers\Admin\UserController::class,'create'])    -> name('user.Create');
    Route::post('/user_save'         ,[App\Http\Controllers\Admin\UserController::class,'save'])      -> name('user.store');
    Route::get('/user_edit/{id}'     ,[App\Http\Controllers\Admin\UserController::class,'edit'])      -> name('admin.users.edit');
    Route::post('/user_update/{id}'  ,[App\Http\Controllers\Admin\UserController::class,'update'])    -> name('admin.users.update');
    Route::get('/user_delete/{id}'   ,[App\Http\Controllers\Admin\UserController::class,'delete'])    -> name('user.delete');
});

///////////////////////////////////////////// topics view ///////////////////////////////////////////

Route::group(['namespace'=> 'admin','middleware' => 'auth'],function (){
    Route::get('/import_topic'   ,[App\Http\Controllers\Admin\TopicController::class,'index'])        -> name('topic.index');
    Route::get('/create'         ,[App\Http\Controllers\Admin\TopicController::class,'create'])       -> name('topics.create');
    Route::post('/save'          ,[App\Http\Controllers\Admin\TopicController::class,'save'])         -> name('topics.save');
    Route::get('/edit/{id}'      ,[App\Http\Controllers\Admin\TopicController::class,'edit'])         -> name('topics.edit');
    Route::post('/update/{id}'   ,[App\Http\Controllers\Admin\TopicController::class,'update'])       ->name('topics.update');
    Route::get('/delete/{id}'    ,[App\Http\Controllers\Admin\TopicController::class,'destroy'])      ->name('topics.delete');
    Route::get('/archive/{id}'   ,[App\Http\Controllers\Admin\TopicController::class,'archive'])      -> name('topics.archive');
    Route::get('/topics_archive' ,[App\Http\Controllers\Admin\TopicController::class,'T_archive'])    -> name('archive');
    Route::get('/show/{id}'      ,[App\Http\Controllers\Admin\TopicController::class,'show'])         -> name('topics.show');
    Route::post('/response'      ,[App\Http\Controllers\Admin\TopicController::class,'response'])     -> name('topics.response');

    ///////////////////////////////////////////// Export view ///////////////////////////////////////////

    Route::get('/export'                ,[App\Http\Controllers\Admin\ExportController::class,'index'])    -> name('exports');
    Route::get('/export_create'         ,[App\Http\Controllers\Admin\ExportController::class,'create'])   -> name('exports.create');
    Route::post('/export_save'          ,[App\Http\Controllers\Admin\ExportController::class,'save'])     -> name('exports.save');
    Route::get('/export_edit/{id}'      ,[App\Http\Controllers\Admin\ExportController::class,'edit'])     -> name('exports.edit');
    Route::post('/export_update/{id}'   ,[App\Http\Controllers\Admin\ExportController::class,'update'])   -> name('exports.update');
    Route::get('/export_delete/{id}'    ,[App\Http\Controllers\Admin\ExportController::class,'destroy'])  -> name('exports.delete');
    Route::get('/export_archive'        ,[App\Http\Controllers\Admin\ExportController::class,'archive'])  -> name('Ex.archive');
    Route::get('/move/{id}'             ,[App\Http\Controllers\Admin\ExportController::class,'delete'])   -> name('exports.archive');
    Route::get('/export_show/{id}'      ,[App\Http\Controllers\Admin\ExportController::class,'show'])     -> name('exports.show');

    ///////////////////////////////////////////// management view ///////////////////////////////////////////

    Route::get('/managemente' ,[App\Http\Controllers\Admin\ManagController::class,'index'])    -> name('manage');
    Route::get('/managemente-create' ,[App\Http\Controllers\Admin\ManagController::class,'create'])    -> name('manage.create');
    Route::post('/manage-store' ,[App\Http\Controllers\Admin\ManagController::class,'store'])    -> name('manage.store');
    Route::get('/manage-edit{id}' ,[App\Http\Controllers\Admin\ManagController::class,'edit'])    -> name('manage.edit');
    Route::post('/manage-update{id}' ,[App\Http\Controllers\Admin\ManagController::class,'update'])    -> name('manage.update');

    ///////////////////////////////////////////// side view ///////////////////////////////////////////

    Route::get('/side'        ,[App\Http\Controllers\Admin\SideController::class,'index'])    -> name('side');
    Route::get('/side-create'        ,[App\Http\Controllers\Admin\SideController::class,'create'])    -> name('side.create');
    Route::post('/side-store' ,[App\Http\Controllers\Admin\SideController::class,'store'])    -> name('side.store');
    Route::get('/side-edit{id}' ,[App\Http\Controllers\Admin\SideController::class,'edit'])    -> name('side.edit');
    Route::post('/side-update{id}' ,[App\Http\Controllers\Admin\SideController::class,'update'])    -> name('side.update');

});

