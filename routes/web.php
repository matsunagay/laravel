<?php

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

use	App\Books;
use Illuminate\Http\Request;

/** * 本 のダッシュボード 表示 */ 
Route::get('/', function () {
    $books = Books::orderBy('created_at', 'asc')->get();
    return view('books', ['books' => $books]);
});

/**
* 新「本」を追加 */
Route::post('/books', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
    ]);
    //バリデーション:エラー
    if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
    }
    // Eloquent モデル
    $books = new Books;
    $books->item_name = $request->item_name;
    $books->item_number = '1';
    $books->item_amout = '1000';
    $books->published = '2017-03-07 00:00:00';
    $books->save();   //「/」ルートにリダイレクト 
    return redirect('/');
});

/**
* 本を削除 */
Route::delete('/book/{book}', function (Books $book) {
    $book->delete();
    return redirect('/');
});





?>