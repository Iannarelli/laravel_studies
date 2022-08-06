<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PagesController;
use App\Models\Test;
use App\Models\User;
use App\Models\Country;
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

Route::get('/find_all', function() {
    $tests = Test::all();

    foreach($tests as $test) {
        echo $test->title.'<br>';
    }
});

Route::get('/find/{id}', function($id) {
    $test = Test::find($id);

    return $test->title;
});

Route::get('/find_where/{id}', function($id) {
    $tests = Test::where('id', '<', $id)->orderBy('title', 'desc')->take(2)->get();
    foreach ($tests as $test) {
        echo $test->title.'<br>';
    };
});

Route::get('/basicinsert', function () {
    $test = new Test;

    $test->title = 'New Eloquent title insert';
    $test->description = 'New Eloquent description insert';
    $test->number = 3;
    $test->name = 'Iannarelli';

    $test->save();
});

Route::get('/create', function() {
    Test::create(['title'=>'Título 2', 'description'=>'Descrição 2', 'number'=>5, 'name'=>'Nome 2']);
});

Route::get('/softdelete', function() {
    Test::find(9)->delete();
});

Route::get('/forcedelete/{id}', function($id) {
    Test::withTrashed()->find($id)->forceDelete();
});

/* hasOne */
Route::get('/user/{id}/test', function($id) {
    return User::find($id)->test->title;
});

/* hasMany */
Route::get('/user/{id}/tests', function($id) {
    $user = User::find($id);

    foreach ($user->tests as $test) {
        echo $test->title.'<br>';
    }
});

/* belongsToMany */
Route::get('/user/{id}/roles', function($id) {
    $user = User::find($id);

    foreach ($user->roles as $role) {
        echo $role->name.'<br>';
        foreach ($role->users as $u) {
            echo $u->email.'<br>';
        }
    }
});

/* Intermediate table */
Route::get('/user/{id}/pivot', function($id) {
    $user = User::find($id);

    foreach ($user->roles as $role) {
        echo $role->pivot->created_at.'<br>';
    }
});

Route::get('/user/country/{id}', function($id) {
    $country = Country::find($id);

    foreach ($country->tests as $test) {
        echo $test->title.'<br>';
    }
});
