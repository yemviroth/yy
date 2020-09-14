<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\RoomMain;
use App\Room;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $rooms = DB::table('rooms')->orderBy('id','asc')->get();

        // return view('home',compact('rooms'));

        // if (session()->has("LANG")) {
        //     $lang = session()->get('LANG');     
        // }

        // if ( empty($lang)) {
        //     $lang ='EN';
        // }

        // $rooms = Room::with('RoomMain')->orderBy('id', 'asc')
        //                         // ->where('lang',$lang)
        //                         ->get();

           
                   
              $product = DB::table('products')->orderBy('proId','asc')->paginate(9);;
               $cates = Category::orderBy('cateId','asc')->get();

         return view ('home',compact('product','cates'));
    }
}
