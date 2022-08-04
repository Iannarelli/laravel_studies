<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PagesController;
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
    return view('welcome');
});

// Route::get('/first_page/{name}', [PagesController::class, 'first_page']);

Route::get('/first_page/{name}', 'App\Http\Controllers\PagesController@first_page');

// Route::get('/first_page/{name}', function($name) {
//     return view('first_page', compact('name'));
// });

Route::get('/second_page', function() {
    return view('second_page');
});

Route::get('/third_page', array('as'=>'third', function() {
    return 'Você chegou ao seu destino!';
}));

Route::get('/insert', function() {
    DB::insert('insert into tests(title, description, number, name) values(?, ?, ?, ?)', ['Primeira inserção', 'Primeira inserção no banco de dados', 1, 'Filipe']);
    return "Info inserted successfully!";
});

Route::get('/read', function() {
    $results = DB::select('select * from tests where id > ?', [1]);
    // return var_dump($results);
    foreach($results as $test) {
        return $test->title;
    }
});

Route::get('/update', function() {
    $updated = DB::update('update tests set name = "Tio Lipe" where id = ?', [2]);
    return $updated;
});

Route::get('/delete', function() {
    $deleted = DB::delete('delete from tests where id >= ?', [3]);
    return $deleted;
});
