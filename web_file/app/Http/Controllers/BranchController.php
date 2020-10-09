<?php

namespace App\Http\Controllers;
use App\Brand;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Image;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if (Auth::check()) {
           
        // Get filename with extension
        $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto1')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = 'theYeon_'.$filename.'.'.$extention;
        $fullpath = public_path('images\\profile\\').$filenameToStore;    
        
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
        request()->filephoto1->move(public_path('images\profile'), $filenameToStore);
       
        $request->request->add(['dsPhoto' => $filenameToStore]);


            Brand::create($request->all());
            return redirect()->route('brand.list')
                ->with('success', 'Distributor created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if (Auth::check()) {
            // $request->request->add(['cateCreated_by' => Auth::user()->name]);
            $edit = Brand::where('id',$id)->first();
         
            return view('brand.edit',compact('edit'));
            
        }
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

        // $edit = Brand::where('id',$id)->first();
        //     $edit = Brand::update($request->all());
        //     return redirect()->route('category.list')
        //         ->with('success', 'Distributor created successfully');
        if (Auth::check()) {
           
        // Get filename with extension
        $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto1')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = 'theYeon_'.$filename.'.'.$extention;
        $fullpath = public_path('images\\profile\\').$filenameToStore;    
        
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
        request()->filephoto1->move(public_path('images\profile'), $filenameToStore);
       
        $request->request->add(['dsPhoto' => $filenameToStore]);}

        $edit = Brand::where('id',$id)->first();
        $edit->update($request->all());
        return redirect()->route('brand.list')
        ->with('success','Distributor Update Successfully');
       
    }

    public function list(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('brand.list',compact('brands'));
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
