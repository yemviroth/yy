<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Room;
use App\RoomDetail;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use DataTables;
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

     public function search(Request $request)
    {
        // $request -> validate(['
        //     'search' => 'required',
        //     ']);
        $search = $request->input('search');
        



        if(request()->has('sort')){
            if(request('sort')==1){
                $pros = Product::where('proName','Like','%'.$search.'%')
                ->orderBy('proId','desc')
                ->get();
            }else if(request('sort')==2){
                $pros = Product::where('proName','Like','%'.$search.'%')
                ->orderBy('proName','desc')
                ->get();
            }else if(request('sort')==3){
                 $pros = Product::where('proName','Like','%'.$search.'%')
                ->orderBy('proPrice','desc')
                ->get();
            }else if(request('sort')==4){
                  $pros = Product::where('proName','Like','%'.$search.'%')
                ->orderBy('proPrice','asc')
                ->get();
            }           
        }else{
             $pros = Product::where('proName','Like','%'.$search.'%')
             ->orderBy('proId','desc')
             ->get();
        }        


        return view('productdetail.search',compact('pros'));
        //dd($pros);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cate = Category::orderBy('cateOrderBy','asc')->get();
        return view ('productdetail.create',compact('cate'));
        // dd($cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $niceNames = [
            'proName' => 'Product Name',           
            
            'proPrice' => 'Price',
            'filephoto1' => 'Photo1',
            'proDescription' => 'Description',
            'proOrderBy' => 'Ordre By',
            'proOther' => 'Other',

         

        ]; 

        $request->validate([
            'proName' => 'required',
            'proPrice' => 'required',
            'filephoto1' => 'required|image|max:2048',
           

            
        ],[],$niceNames);
       
        if (Auth::check()) {
            $request->request->add(['createdBy' => Auth::user()->name]);

       
        //Photo1
        // Get filename with extension
        $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto1')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = 'theYeon_'.$filename.'.'.time().'.'.$extention;
        $fullpath = public_path('images\\product\\').$filenameToStore;    
        
        //Resize
        $image = $request->file('filephoto1');
        $img = Image::make($_FILES['filephoto1']['tmp_name']);
        
        // $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
        $name_thumbnail = $request->$filename.$extention;
        $fullpath__thumbnail = public_path('images\\').$name_thumbnail;

        $destinationPath = public_path('\images\thumbnail');
        
        $img->resize(570, 378, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'\\'.$name_thumbnail);    
            
        if (file_exists($fullpath__thumbnail)) {
            @unlink($fullpath__thumbnail);
        }
        //end Resize

        if (file_exists($fullpath)) {
            @unlink($fullpath);
        }
        // Upload image
        //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
        request()->filephoto1->move(public_path('images\product'), $filenameToStore);
        // request()->filephoto1->move(public_path('images\product'), $filenameToStore);
        // assign new value
        //$request->merge(['roster_photo' => $filenameToStore]);
        $request->request->add(['proImage' => $filenameToStore]);
        Product::create($request->all());
        
       return redirect()->route('productdetail.list')->with('message','Item has been Add Success');
    }
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

         // $products = Product::with('Category')->where('proId',$id)->get();

     
    //     $subcate=$categ->subCateName;

    // //     $categ = Category::with('products')->where('cateId',1)->first();
    // //    $prod = $categ->proName;
    //     dd($subcate);
        


// $category=Category::with('subCategories')->where('cateId',$id)->first();
// dd($category);
// $category = Category::with('subCategories')->find(1);
// dd($category);


             // get previous user id
        $previous = DB::table('products')->where('proId', '<', $products[0]->proId)->max('proId');

        // get next user id
        $next = DB::table('products')->where('proId', '>', $products[0]->proId)->min('proId');

       return view ('productdetail.show',compact('products','cates','previous','next'));
    //    return view ('productdetail.show',compact('cates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // $product = Product::findOrFail($id);
         $products = DB::table('products')
         ->where('proId',$id)
         ->get();

         $cates = DB::table('category')
         ->orderBy('cateId','desc')
         ->get();


        return view ('productdetail.edit',compact('products','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, $id)
    // {   
    //     $products = DB::table('products')
    //     ->where('proId',$id)
    //     ->get();

    //     $products->save($request->all());
    //     //             $products->save();
    //     //        return redirect()->route('productdetail.list')
    //     //                             ->with('success', 'Room created successfully');
    // }
   

    public function update(Request $request, $id)
    {
        //

        // $niceNames = [
        //     'proName' => 'Product Name',           
            
        //     'proPrice' => 'Price',
        //     'filephoto1' => 'Photo1',
        //     'proDescription' => 'Description',
        //     'proOrderBy' => 'Ordre By',
        //     'proOther' => 'Other',

         

        // ]; 

        // $request->validate([
        //     'proName' => 'required',
        //     'proPrice' => 'required',
        //     'filephoto1' => 'required|image|max:2048',
           

            
        // ],[],$niceNames);
      
        // $products=Product::Where('proId',$id)->save();
        
        $this->validate($request,[
            'proName'=>'required'
        ]);
        $pro = Product::where('proId', $id)
        ->first();
        // $pro = DB::table('products')->where('proId',$id);
        // $pro->proName = $request->input('proName');
        
        if (Auth::check()) {
            // $request->request->add(['updated_by' => Auth::user()->name]);
       
      

       // Get filename with extension

       if ($request->hasFile('filephoto')) {
           # code...
      
       $filenameWithExt = $request->file('filephoto')->getClientOriginalName();
       
       // Get jus the filename
       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

       // Get Extension
       $extention = $request->file('filephoto')->getClientOriginalExtension();

       // Create new filename
       //$filenameToStore = $filename.'_'.time().'.'.$extention;
       $filenameToStore =$filename.'.'.$extention;
       $fullpath = public_path('images\\product\\').$filenameToStore;
       
       if (file_exists($fullpath)) {
           @unlink($fullpath);
       }

       // Upload image
       //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);

       request()->filephoto->move(public_path('images\product'), $filenameToStore);

       // assign new value
     
       $request->request->add(['proImage' => $filenameToStore]);

       }
      
       $pro->update($request->all());
       return redirect()->route('productdetail.list')
                            ->with('success', 'Product created successfully');
     } 
       
       return redirect()->route('productdetail.list')
                            ->with('success', 'Product created successfully');
 

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
        $pros = Product::where('proId',$id)->first();
        $pros->destroy($id);
        return redirect()->route('productdetail.list')
        ->with('danger', 'Sub Category Deleted successfully');
       
    }

    public function list(Request $request)
    {
        //
        // $products = DB::table('products')
        // ->orderBy('proId','desc')->paginate(5);

        // $cates = DB::table('category')
        // ->orderBy('cateId','desc')
        // ->get();
        // return view ('productdetail.list',compact('products','cates'));

        if($request->ajax()){
            $data = DB::table('products')->get();
            return DataTables::of($data)->make(true);
        }
        return view('productdetail.list');

    }
}
