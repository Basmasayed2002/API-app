<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Article;
 
Route::get('articles', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Article::all();
});
 
Route::get('articles/{id}', function($id) {
    return Article::find($id);
});

Route::post('articles', function(Request $request) {
    return Article::create($request->all);
});

Route::put('articles/{id}', function(Request $request, $id) {
    $article = Article::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('articles/{id}', function($id) {
    Article::find($id)->delete();

    return 204;
});

Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{id}', 'ArticleController@update');
Route::delete('articles/{id}', 'ArticleController@delete');

Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');
