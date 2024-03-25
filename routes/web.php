<?php

use App\Http\Controllers\contactFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// お問い合わせ入力フォーム
Route::get('/contact',[App\Http\Controllers\contactFormController::class, 'index'])->name('contact.index');
//お問い合わせ内容確認
Route::get('/contact/confirm',[App\Http\Controllers\contactFormController::class, 'create'])->name('contact.confirm');
// お問い合わせ完了
Route::post('/contact/send',[App\Http\Controllers\contactFormController::class, 'store'])->name('contact.send');
// お問い合わせ内容一覧
Route::get('/contact/contents', [App\Http\Controllers\contactFormController::class, 'show'])->name('contact.show');


