<?php
use Illuminate\Http\Request;
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
    $links = \App\link::all();
    return view('welcome')->withLinks($links);
});

Route::get('/submit',function(){
    return view('submit');
});

Route::post('/submit', function(Request $request){
    $data=$request->validate([
        'title'=>'required|max:255',
        'url'=>'required|url|max:255',
        'description'=>'required|max:255'
    ]);

    //$link=tap(new App\link($data))->save(); //mass save
    $link = new App\link;
    $link->title= $data['title'];
    $link->url = $data['url'];
    $link->description = $data['description'];
    $link->save();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
