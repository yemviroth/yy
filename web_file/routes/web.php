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
use App\Campany;
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
  $company = Campany::where('id','1')->get();
  $view->with('cates',$cates)->with('company',$company);
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

      Route::resource('user','UserController');
    
  
    Route::PUT('products/update/{proId}','ProductController@update')->name('productdetail.update');
    Route::get('products/list','ProductController@list')->name('productdetail.list');

    Route::match(['delete'],'products/{product}','ProductController@destroy')->name('productdetail.destroy');
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

    // 
    Route::resource('dashboard','DashController');

    //Company
    Route::resource('company','CampanyController');

Route::get('categories/{cateId}','CategoryController@subCate')->name('categories');
});



// Product Detail
Route::get('products/{product}','ProductController@show')->name('productdetail.show');
Route::GET('/search/','ProductController@search')->name('search');

//Category
Route::get('category/{cateId}','CategoryController@show')->name('category.show');

//SubCategory
Route::get('subCates/{subCateId}','CategoryController@subCate_show')->name('category/subcategory.show');
Route::get('category/subCates/create','CategoryController@subCate_create')->name('category/subcategory.create');
Route::POST('category/subCates/store','CategoryController@subCate_store')->name('category/subcategory.store');
Route::get('category/subCates/{subCateId}','CategoryController@subCate_edit')->name('category/subcategory.edit');
Route::PUT('category/subCates/update/{subCateId}','CategoryController@subCate_update')->name('category/subcategory.update');
Route::match(['delete'],'category/subCates/{subCateId}','CategoryController@subCate_destroy')->name('category/subcategory.destroy');

// Route::get('sitemap/',function (){ 
//   return view('sitemap.sitemap');
// })->name('sitemap');

// Route::get('healthybar/',function (){ 
//   return view('healthybar.index');
// })->name('healthybar');

// Route::get('snooker/',function (){ 
//   return view('snooker.index');
// })->name('snooker');

Route::get('about/ingre',function (){ 
  return view('about/ingre/ingre');
})->name('ingrediant');


Route::resource('translate','TranslateController');



Route::get('/tinymce_test', function () {
  return view('mceImageUpload::example');
});


