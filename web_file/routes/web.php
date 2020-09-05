<?php
// use Category;
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
use App\Category;
// Route::get('/', function () {
//     return view('home');
// });
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

// Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

View::composer(['*'],function($view){
  $cates = Category::orderBy('cateOrderBy','asc')->get();
  $view->with('cates',$cates);
});


Route::get('/about','AboutController@index')->name('about.index');
Route::resource('service','ServiceController');



use Illuminate\Http\Request;
Route::post('/', function (Request $request) {
    $content = $request->content1;
    return view('/')->with(compact('content'));
})->name('tinymce.store');




Route::resource('contact','ContactController');
Route::resource('spa','SpaController');
Route::resource('gym','GymController');
Route::resource('restaurant','RestaurantController');
Route::resource('roomdetail','RoomDetailController');
Route::resource('gallery','GalleryController');
// Route::get('/rooms','RoomsController@index')->name('rooms.index');;
// Route::match(['get'],'rooms/{id}','RoomsController@show')->name('rooms.show');

Route::middleware(['auth'])->group(function () {

    Route::get('rooms/main','RoomsController@main_index')->name('rooms.main');
    Route::get('rooms/main/create','RoomsController@main_create')->name('rooms.main.create');
    Route::post('rooms/main/store','RoomsController@main_store')->name('rooms.main.store');
    Route::get('rooms/main/{id}/edit','RoomsController@main_edit')->name('rooms.main.edit');
    //Route::put('rooms/main/update','RoomsController@main_update')->name('rooms.main.update');
    Route::match(['put', 'patch'],'rooms/main/{id}','RoomsController@main_update')->name('rooms.main.update');

    Route::get('rooms/list','RoomsController@list')->name('rooms.list');
    
    //Detail
    Route::get('rooms/detail','RoomsController@detail_list')->name('rooms.detail.list');
    Route::get('rooms/detail/{id}/edit','RoomsController@detail_edit')->name('rooms.detail.edit');
    Route::match(['put', 'patch'],'rooms/detail/{id}','RoomsController@detail_update')->name('rooms.detail.update');

    Route::match(['delete'],'rooms/detail/{id}','RoomsController@detail_delete')->name('rooms.detail.delete');
    Route::get('rooms/detail/create','RoomsController@detail_create')->name('rooms.detail.create');
    Route::post('rooms/detail/store','RoomsController@detail_store')->name('rooms.detail.store');


    Route::resource('rooms','RoomsController');
    Route::resource('user','UserController');
    
    // product detail
    // Route::match(['put', 'patch'],'products/update/{proId}','ProductController@update')->name('productdetail.update');
    // Route::PUT('products/update/{proId}','ProductController@update');
    Route::PUT('products/update/{proId}','ProductController@update')->name('productdetail.update');
    Route::get('products/list','ProductController@list')->name('productdetail.list');

    
    Route::get('products/{product}/edit','ProductController@edit')->name('productdetail.edit');
    Route::get('products/create','ProductController@create')->name('productdetail.create');
    Route::POST('products/store','ProductController@store')->name('productdetail.store');
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

    // Category
    Route::get('category/list','CategoryController@list')->name('category.list');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::POST('category/store','CategoryController@store')->name('category.store');
    Route::get('category/{cateId}/edit','CategoryController@edit')->name('category.edit');
    Route::PUT('category/update/{cateId}','CategoryController@update')->name('category.update');
    Route::match(['delete'],'category/{cateId}','CategoryController@destroy')->name('category.destroy');
});

Route::get('rooms','RoomsController@index')->name('rooms.index');
Route::get('rooms/{room}','RoomsController@show')->name('rooms.show');


// Product Detail
Route::get('products/{product}','ProductController@show')->name('productdetail.show');


Route::get('sitemap/',function (){ 
  return view('sitemap.sitemap');
})->name('sitemap');

Route::get('healthybar/',function (){ 
  return view('healthybar.index');
})->name('healthybar');

Route::get('snooker/',function (){ 
  return view('snooker.index');
})->name('snooker');


Route::resource('translate','TranslateController');






