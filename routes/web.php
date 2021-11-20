<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'Login\IndexController@index')->name('login');
Route::post('login/submit', 'Login\IndexController@submit')->name('login.submit');
Route::get('logout', 'Login\IndexController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('index');
    // })->name('index');

    // Route::get('index', function () {
    //     return view('index');
    // });

    Route::get('/', 'Index\IndexController@index')->name('index');
    // Route ke index user role
    // Route::get('/konsumen', 'IndexKonsumen\IndexController@index')->name('index_konsumen');
    // Route::get('/produsen', 'IndexProdusen\IndexController@index')->name('index_produsen');
    
    Route::get('admin', 'Admin\IndexController@index')->name('admin');
    Route::get('admin/tambah', 'Admin\CreateController@index')->name('admin.create');
    Route::post('admin/tambah', 'Admin\CreateController@submit')->name('admin.submit');
    Route::get('admin/sunting/{id}', 'Admin\UpdateController@index')->name('admin.edit');
    Route::patch('admin/sunting/{id}', 'Admin\UpdateController@update')->name('admin.update');
    Route::get('admin/hapus/{id}','Admin\DeleteController@delete')->name('admin.delete');
    Route::get('admin/cetak_pdf', 'Admin\IndexController@cetak_pdf')->name('admin.cetak_pdf');

    Route::get('group', 'Group\IndexController@index')->name('group');
    Route::get('group/tambah', 'Group\CreateController@index')->name('group.create');
    Route::post('group/tambah', 'Group\CreateController@submit')->name('group.submit');
    Route::get('group/sunting/{id}', 'Group\UpdateController@index')->name('group.edit');
    Route::patch('group/sunting/{id}', 'Group\UpdateController@update')->name('group.update');
    Route::get('group/hapus/{id}','Group\DeleteController@delete')->name('group.delete');
    Route::get('group/cetak_pdf', 'Group\IndexController@cetak_pdf')->name('group.cetak_pdf');


    Route::get('installation', 'Installation\IndexController@index')->name('installation');
    Route::get('installation/tambah', 'Installation\CreateController@index')->name('installation.create');
    Route::post('installation/tambah', 'Installation\CreateController@submit')->name('installation.submit');
    Route::get('installation/sunting/{id}', 'Installation\UpdateController@index')->name('installation.edit');
    Route::patch('installation/sunting/{id}', 'Installation\UpdateController@update')->name('installation.update');
    Route::get('installation/hapus/{id}','Installation\DeleteController@delete')->name('installation.delete');
    Route::get('installation/cetak_pdf', 'Installation\IndexController@cetak_pdf')->name('installation.cetak_pdf');

    Route::get('payment', 'Payment\IndexController@index')->name('payment');
    Route::get('payment/tambah', 'Payment\CreateController@index')->name('payment.create');
    Route::post('payment/tambah', 'Payment\CreateController@submit')->name('payment.submit');
    Route::get('payment/sunting/{id}', 'Payment\UpdateController@index')->name('payment.edit');
    Route::patch('payment/sunting/{id}', 'Payment\UpdateController@update')->name('payment.update');
    Route::get('payment/hapus/{id}','Payment\DeleteController@delete')->name('payment.delete');
    Route::get('payment/cetak_pdf', 'Payment\IndexController@cetak_pdf')->name('payment.cetak_pdf');

    Route::get('user', 'User\IndexController@index')->name('user');
    Route::get('user/tambah', 'User\CreateController@index')->name('user.create');
    Route::post('user/tambah', 'User\CreateController@submit')->name('user.submit');
    Route::get('user/sunting/{id}', 'User\UpdateController@index')->name('user.edit');
    Route::patch('user/sunting/{id}', 'User\UpdateController@update')->name('user.update');
    Route::get('user/hapus/{id}','User\DeleteController@delete')->name('user.delete');
    Route::get('user/cetak_pdf', 'User\IndexController@cetak_pdf')->name('user.cetak_pdf');
});

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/' . $filename);
// dd($path);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});