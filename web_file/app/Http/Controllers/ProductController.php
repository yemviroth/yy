<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Room;
use App\RoomDetail;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('productdetail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'proName'=> 'required',
            'proDescription'=> 'required',
            

        ]);
        //Log::create($request->all());
        //Create New Data
        $pro = new Product;
        $pro->proName = $request->proName;
        $pro->proDescription = $request->proDescription;
       
        $pro->save();
       return redirect()->route('home.index')->with('message','Item has been Add Success');
        //
    //     $niceNames = [
    //         'name' => 'Room Name',           
    //         'filephoto1' => 'Photo1 (Main)',
    //         'filephoto2' => 'Photo2',
    //         'filephoto3' => 'Photo3',
    //         'filephoto4' => 'Photo4',
    //         'filephoto5' => 'Photo5',
    //         'filephoto6' => 'Photo6',
    //         'filephoto7' => 'Photo7',

    //     ]; 

    //     $request->validate([
    //         'name' => 'required',
    //         'filephoto1' => 'required|image|max:2048',
    //         'filephoto2' => 'nullable|image|max:2048',
    //         'filephoto3' => 'nullable|image|max:2048',
    //         'filephoto4' => 'nullable|image|max:2048',
    //         'filephoto5' => 'nullable|image|max:2048',
    //         'filephoto6' => 'nullable|image|max:2048',
    //         'filephoto7' => 'nullable|image|max:2048',

            
    //     ],[],$niceNames);

    //     if (Auth::check()) {
    //         $request->request->add(['created_by' => Auth::user()->name]);

       
    //     //Photo1
    //     // Get filename with extension
    //     $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();        
    //     // Get jus the filename
    //     $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
    //     // Get Extension
    //     $extention = $request->file('filephoto1')->getClientOriginalExtension();
    //     // Create new filename
    //     //$filenameToStore = $filename.'_'.time().'.'.$extention;
    //     $filenameToStore = 'room_'.$request->input('name').'.'.$extention;
    //     $fullpath = public_path('images\\').$filenameToStore;    
        
    //     //Resize
    //     $image = $request->file('filephoto1');
    //     $img = Image::make($_FILES['filephoto1']['tmp_name']);
        
    //     // $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
    //     $name_thumbnail = $request->input('name').$extention;
    //     $fullpath__thumbnail = public_path('images\\').$name_thumbnail;

    //     $destinationPath = public_path('\images\thumbnail');
        
    //     $img->resize(570, 378, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destinationPath.'\\'.$name_thumbnail);    
            
    //     if (file_exists($fullpath__thumbnail)) {
    //         @unlink($fullpath__thumbnail);
    //     }
    //     //end Resize

    //     if (file_exists($fullpath)) {
    //         @unlink($fullpath);
    //     }
    //     // Upload image
    //     //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
    //     request()->filephoto1->move(public_path('images'), $filenameToStore);
    //     // assign new value
    //     //$request->merge(['roster_photo' => $filenameToStore]);
    //     $request->request->add(['photo1' => $filenameToStore]);
    // }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // $product = Product::findOrFail($id);
         $products = DB::table('products')
         ->where('proId',$id)
         ->get();

         $cates = DB::table('category')
         ->orderBy('cateId','desc')
         ->get();


        return view ('productdetail.show',compact('products','cates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
