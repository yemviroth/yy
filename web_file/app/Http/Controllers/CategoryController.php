<?php

namespace App\Http\Controllers;
use DB;
// use Illuminate\Http\Request;
// use DB;
// use App\Room;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\RoomDetail;
use App\Http\Controllers\Controller;

use Auth;
use Image;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view ('rooms.index');
        //$rooms=DB::select(DB::raw("SELECT r.*,d.text FROM rooms r LEFT JOIN room_details d on r.id=d.room_id ")) ;


        // $rooms = DB::table('rooms')->orderBy('id','asc')->get();

        // $details=DB::select(DB::raw("SELECT r.*,d.text,d.icon FROM rooms r LEFT JOIN room_details d on r.id=d.room_id ORDER BY r.id asc, d.`order` asc"));

        //  return view ('rooms.index',compact('rooms'),compact('details'));


        // $lang = Session::get('LANG');

        // if (session()->has("LANG")) {
        //     $lang = session()->get('LANG');     
        // }

        // if ( empty($lang)) {
        //     $lang ='EN';
        // }
         
        //  $product =   Product::all();
                          
        //                         ->get();
                   
         // $details = RoomDetail::with('RoomMain')->orderBy('id', 'asc')
         //                        ->where('lang',$lang)
         //                        ->get();
                                

         return view ('rooms.index',compact('rooms'),compact('details'));
    
                   
         // $details = RoomDetail::with('RoomMain')->orderBy('id', 'asc')
         //                        ->where('lang',$lang)
         //                        ->get();
                                

        //  return view ('rooms.index',compact('rooms'),compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mains = RoomMain::orderBy('id', 'asc')->get();
        return view ('rooms.create',compact('mains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $niceNames = [
            'name' => 'Room Name',
            'price' => 'Room Price',
            'description' => 'Description',     
            'name_th' => 'Room Name Thai',            
            'name_ch' => 'Room Name China',
            'description_th' => 'Description Thai',                      
            'description_ch' => 'Description China',                      

        ]; 

        $request->validate([
            'name' => 'required',
            'name_th' => 'required',
            'name_ch' => 'required',
            'price' => 'required',
            'description' => 'required',
            'description_th' => 'required',
            'description_ch' => 'required',
            
        ],[],$niceNames);

        if (Auth::check()) {
            $request->request->add(['created_by' => Auth::user()->name]);                    

        Room::create($request->all());
        return redirect()->route('rooms.list')
                             ->with('success', 'Room created successfully');

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
        // return view('roomdetail.index');

        // $details=DB::select(DB::raw("SELECT r.*,d.text,d.icon FROM rooms r LEFT JOIN room_details d on r.id=d.room_id where r.id=$id  ORDER BY r.id asc, d.`order` asc")) ;

        // return view ('roomdetail.index',compact('details'));
        if (session()->has("LANG")) {
            $lang = session()->get('LANG');     
        }

        if ( empty($lang)) {
            $lang ='EN';
        }
        

        $rooms = Room::with('RoomMain')->orderBy('id', 'asc')
                // ->where('lang',$lang)
                ->where('id',$id)
                ->get();

        $details = RoomDetail::with('RoomMain')->orderBy('id', 'asc')
                ->where('lang',$lang)
                //->where('id',$rooms[0]->RoomMain->id)
                ->where('room_id',$rooms[0]->RoomMain->id)
                ->get();          
// 
        // return view ('roomdetail.index',compact('rooms'));        
        return view ('roomdetail.index',compact('rooms'),compact('details')); 


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

          // $edits=DB::select(DB::raw("SELECT r.*,d.text,d.icon FROM rooms r LEFT JOIN room_details d on r.id=d.room_id where r.id=$id  ORDER BY r.id asc, d.`order` asc")) ;

        //  $edits = Room::with('details')->findOrFail($id);
        $edits = Room::findOrFail($id);

         //dd($edits);
         return view ('rooms.edit',compact('edits'));
          // return $edits;

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
       

         //    $room = Room::findOrFail($id);
         //    $room->name = $request-> input('name');
         //    $room->price = $request->input('price');
         //    $room->description = $request->input('description');
         //    $room->price = $request->input('price');
         //   // $room->filephoto = $request->merge(['photo' => $filenameToStore]);
         //    $room->save();
         //    return redirect()->route('rooms.list')
         // ->with('success', 'Room Update successfully');

       $niceNames = [
            'name' => 'Room Name',
            'price' => 'Room Price',
            'description' => 'Description',     
            'name_th' => 'Room Name Thai',            
            'name_ch' => 'Room Name China',
            'description_th' => 'Description Thai',                      
            'description_ch' => 'Description China',                      

        ]; 

        $request->validate([
            'name' => 'required',
            'name_th' => 'required',
            'name_ch' => 'required',
            'price' => 'required',
            'description' => 'required',
            'description_th' => 'required',
            'description_ch' => 'required',
            
        ],[],$niceNames);

        $room = Room::findOrFail($id);
        if (Auth::check()) {
             $request->request->add(['updated_by' => Auth::user()->name]);
        
       

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
        $filenameToStore = $request->input('name').'.'.$extention;
        $fullpath = public_path('images\\').$filenameToStore;
        
        if (file_exists($fullpath)) {
            @unlink($fullpath);
        }

        // Upload image
        //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);

        request()->filephoto->move(public_path('images'), $filenameToStore);

        // assign new value
      
        // $request->request->add(['photo' => $filenameToStore]);

        }
       
        $room->update($request->all());
        return redirect()->route('rooms.list')
                             ->with('success', 'Room created successfully');
      }  
      return redirect()->route('rooms.list');                     

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
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.list')
                             ->with('success', 'Room deleted successfully');
    }

    public function list()
    {
        // $rooms = DB::table('rooms')->orderBy('id','asc')->get();
        //$rooms = Room::all();
        // $roomdetail = $rooms->roomdetails;
        //dd($roomdetail);
         //dd($rooms);  

        //  $rooms = DB::table('rooms')
        //             ->leftJoin('room_details', 'rooms.id', '=', 'room_details.room_id')
        //             ->select('id,created_at')
        //             ->orderBy('rooms.id','asc')->get();
        //   $rooms=DB::select(DB::raw("SELECT r.*,d.text FROM rooms r LEFT JOIN room_details d on r.id=d.room_id ")) ;


          //$rooms = DB::table('rooms')->orderBy('id','asc')->orderBy('rooms.id','asc')->get();
          $rooms = Room::with('RoomMain')->orderBy('id', 'asc')
                                // ->where('lang','EN')
                                ->get();

            
                   

         return view ('rooms.list',compact('rooms'));


        
        //return view ('rooms.list')->with('rooms',$rooms);
    }
    
    public function main_index()
    {
        $roommains = DB::table('room_main')->orderBy('id','asc')->get();
        

        return view('roommain.index',compact('roommains'));
    }

    public function main_create()
    {
        return view ('roommain.create');
    }

    public function main_store(Request $request)
    {
        //
        $niceNames = [
            'name' => 'Room Name',           
            'filephoto1' => 'Photo1 (Main)',
            'filephoto2' => 'Photo2',
            'filephoto3' => 'Photo3',
            'filephoto4' => 'Photo4',
            'filephoto5' => 'Photo5',
            'filephoto6' => 'Photo6',
            'filephoto7' => 'Photo7',

        ]; 

        $request->validate([
            'name' => 'required',
            'filephoto1' => 'required|image|max:2048',
            'filephoto2' => 'nullable|image|max:2048',
            'filephoto3' => 'nullable|image|max:2048',
            'filephoto4' => 'nullable|image|max:2048',
            'filephoto5' => 'nullable|image|max:2048',
            'filephoto6' => 'nullable|image|max:2048',
            'filephoto7' => 'nullable|image|max:2048',

            
        ],[],$niceNames);

        if (Auth::check()) {
            $request->request->add(['created_by' => Auth::user()->name]);

       
        //Photo1
        // Get filename with extension
        $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto1')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = 'room_'.$request->input('name').'.'.$extention;
        $fullpath = public_path('images\\').$filenameToStore;    
        
        //Resize
        $image = $request->file('filephoto1');
        $img = Image::make($_FILES['filephoto1']['tmp_name']);
        
        // $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
        $name_thumbnail = $request->input('name').$extention;
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
        request()->filephoto1->move(public_path('images'), $filenameToStore);
        // assign new value
        //$request->merge(['roster_photo' => $filenameToStore]);
        $request->request->add(['photo1' => $filenameToStore]);

        //Photo2
        if ($request->has('filephoto2')) {
        
        // Get filename with extension
        $filenameWithExt = $request->file('filephoto2')->getClientOriginalName();        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto2')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = 'room_'.$request->input('name').'_2.'.$extention;
        $fullpath = public_path('images\\').$filenameToStore;        
        if (file_exists($fullpath)) {
            @unlink($fullpath);
        }
        // Upload image
        //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
        request()->filephoto2->move(public_path('images'), $filenameToStore);
        // assign new value
        //$request->merge(['roster_photo' => $filenameToStore]);
        $request->request->add(['photo2' => $filenameToStore]);
        
        }

        //Photo3
        if ($request->has('filephoto3')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto3')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto3')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_3.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto3->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo3' => $filenameToStore]);
            
            }
        
            //Photo4
        if ($request->has('filephoto4')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto4')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto4')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_4.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto4->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo4' => $filenameToStore]);
            
            }

            //Photo5
        if ($request->has('filephoto5')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto5')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto5')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_5.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto5->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo5' => $filenameToStore]);
            
            }

             //Photo6
        if ($request->has('filephoto6')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto6')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto6')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_6.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto6->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo6' => $filenameToStore]);
            
            }

             //Photo7
        if ($request->has('filephoto7')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto7')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto7')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_7.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto7->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo7' => $filenameToStore]);
            
            }



        RoomMain::create($request->all());
        return redirect()->route('rooms.main')
                             ->with('success', 'Room Main created successfully');

      }       
    }

    public function main_edit($id)
    {
        //

          // $edits=DB::select(DB::raw("SELECT r.*,d.text,d.icon FROM rooms r LEFT JOIN room_details d on r.id=d.room_id where r.id=$id  ORDER BY r.id asc, d.`order` asc")) ;

         $edits = RoomMain::findOrFail($id);

         //dd($edits);
         return view ('roommain.edit',compact('edits'));
          // return $edits;

    }

    public function main_update(Request $request, $id)
    {
       

         //    $room = Room::findOrFail($id);
         //    $room->name = $request-> input('name');
         //    $room->price = $request->input('price');
         //    $room->description = $request->input('description');
         //    $room->price = $request->input('price');
         //   // $room->filephoto = $request->merge(['photo' => $filenameToStore]);
         //    $room->save();
         //    return redirect()->route('rooms.list')
         // ->with('success', 'Room Update successfully');
          

        //
        $niceNames = [
            'name' => 'Room Name',           
            'filephoto1' => 'Photo1 (Main)',
            'filephoto2' => 'Photo2',
            'filephoto3' => 'Photo3',
            'filephoto4' => 'Photo4',
            'filephoto5' => 'Photo5',
            'filephoto6' => 'Photo6',
            'filephoto7' => 'Photo7',

        ]; 

        $request->validate([
            'name' => 'required',
            'filephoto1' => 'sometimes|image|max:2048',
            'filephoto2' => 'nullable|image|max:2048',
            'filephoto3' => 'nullable|image|max:2048',
            'filephoto4' => 'nullable|image|max:2048',
            'filephoto5' => 'nullable|image|max:2048',
            'filephoto6' => 'nullable|image|max:2048',
            'filephoto7' => 'nullable|image|max:2048',

            
        ],[],$niceNames);



        $room = RoomMain::findOrFail($id);
        if (Auth::check()) {
             $request->request->add(['updated_by' => Auth::user()->name]);
        
       

        // Get filename with extension

        if ($request->hasFile('filephoto1')) {                   
        $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();
        
        // Get jus the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Get Extension
        $extention = $request->file('filephoto1')->getClientOriginalExtension();
        // Create new filename
        //$filenameToStore = $filename.'_'.time().'.'.$extention;
        $filenameToStore = $request->input('name').'.'.$extention;
        $fullpath = public_path('images\\').$filenameToStore;        
        if (file_exists($fullpath)) {
            @unlink($fullpath);
        }
//Resize
$image = $request->file('filephoto1');
$img = Image::make($_FILES['filephoto1']['tmp_name']);

// echo $_FILES['filephoto1']['tmp_name'];
// die();


// $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
$name_thumbnail = $request->input('name').'.'.$extention;
$fullpath__thumbnail = public_path('images\\thumbnail\\').$name_thumbnail;

$destinationPath = public_path('images/thumbnail');

// echo $destinationPath;
// die();

$img->resize(570, 378, function ($constraint) {
    $constraint->aspectRatio();
})->save($destinationPath.'/'.$name_thumbnail);    
    
if (file_exists($fullpath__thumbnail)) {
    @unlink($fullpath__thumbnail);
}

//end Resize


        // Upload image
        //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
        request()->filephoto1->move(public_path('images'), $filenameToStore);
        // assign new value      
         $request->request->add(['photo1' => $filenameToStore]);
        }

        //Photo2
        if ($request->has('chkphoto2')) {  
            $fullpath = public_path('images\\').$room->photo2;
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            $room->photo2= null;
        }
    elseif ($request->has('filephoto2')) {
        
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto2')->getClientOriginalName();        
            // Get jus the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto2')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_'.$request->input('name').'_2.'.$extention;
            $fullpath = public_path('images\\').$filenameToStore;        
            if (file_exists($fullpath)) {
                @unlink($fullpath);
            }
            // Upload image
            //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
            request()->filephoto2->move(public_path('images'), $filenameToStore);
            // assign new value
            //$request->merge(['roster_photo' => $filenameToStore]);
            $request->request->add(['photo2' => $filenameToStore]);
            
            }
    
            //Photo3
            if ($request->has('chkphoto3')) {  
                $fullpath = public_path('images\\').$room->photo3;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo3 = null;
            }
        elseif ($request->has('filephoto3')) {
            
                // Get filename with extension
                $filenameWithExt = $request->file('filephoto3')->getClientOriginalName();        
                // Get jus the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto3')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_'.$request->input('name').'_3.'.$extention;
                $fullpath = public_path('images\\').$filenameToStore;        
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                // Upload image
                //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
                request()->filephoto3->move(public_path('images'), $filenameToStore);
                // assign new value
                //$request->merge(['roster_photo' => $filenameToStore]);
                $request->request->add(['photo3' => $filenameToStore]);
                
                }
            
                //Photo4
                if ($request->has('chkphoto4')) {  
                    $fullpath = public_path('images\\').$room->photo4;
                    if (file_exists($fullpath)) {
                        @unlink($fullpath);
                    }
                    $room->photo4 = null;
                }
            elseif ($request->has('filephoto4')) {
            
                // Get filename with extension
                $filenameWithExt = $request->file('filephoto4')->getClientOriginalName();        
                // Get jus the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto4')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_'.$request->input('name').'_4.'.$extention;
                $fullpath = public_path('images\\').$filenameToStore;        
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                // Upload image
                //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
                request()->filephoto4->move(public_path('images'), $filenameToStore);
                // assign new value
                //$request->merge(['roster_photo' => $filenameToStore]);
                $request->request->add(['photo4' => $filenameToStore]);
                
                }
    
                //Photo5
                if ($request->has('chkphoto5')) {  
                    $fullpath = public_path('images\\').$room->photo5;
                    if (file_exists($fullpath)) {
                        @unlink($fullpath);
                    }
                    $room->photo5 = null;
                }
            elseif ($request->has('filephoto5')) {
            
                // Get filename with extension
                $filenameWithExt = $request->file('filephoto5')->getClientOriginalName();        
                // Get jus the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto5')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_'.$request->input('name').'_5.'.$extention;
                $fullpath = public_path('images\\').$filenameToStore;        
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                // Upload image
                //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
                request()->filephoto5->move(public_path('images'), $filenameToStore);
                // assign new value
                //$request->merge(['roster_photo' => $filenameToStore]);
                $request->request->add(['photo5' => $filenameToStore]);
                
                }
    
                 //Photo6
                 if ($request->has('chkphoto6')) {  
                    $fullpath = public_path('images\\').$room->photo6;
                    if (file_exists($fullpath)) {
                        @unlink($fullpath);
                    }
                    $room->photo6 = null;
                }
            elseif ($request->has('filephoto6')) {
            
                // Get filename with extension
                $filenameWithExt = $request->file('filephoto6')->getClientOriginalName();        
                // Get jus the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto6')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_'.$request->input('name').'_6.'.$extention;
                $fullpath = public_path('images\\').$filenameToStore;        
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                // Upload image
                //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
                request()->filephoto6->move(public_path('images'), $filenameToStore);
                // assign new value
                //$request->merge(['roster_photo' => $filenameToStore]);
                $request->request->add(['photo6' => $filenameToStore]);
                
                }
    
                 //Photo7
                 if ($request->has('chkphoto7')) {  
                    $fullpath = public_path('images\\').$room->photo7;
                    if (file_exists($fullpath)) {
                        @unlink($fullpath);
                    }
                    $room->photo7 = null;
                }
            elseif ($request->has('filephoto7')) {
            
                // Get filename with extension
                $filenameWithExt = $request->file('filephoto7')->getClientOriginalName();        
                // Get jus the filename
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto7')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_'.$request->input('name').'_7.'.$extention;
                $fullpath = public_path('images\\').$filenameToStore;        
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                // Upload image
                //$path = $request->file('roster_photo')->storeAs('public/photos/roster'.$request->input('roster_photo'), $filenameToStore);
                request()->filephoto7->move(public_path('images'), $filenameToStore);
                // assign new value
                //$request->merge(['roster_photo' => $filenameToStore]);
                $request->request->add(['photo7' => $filenameToStore]);
                
                }
                

        $timezone = \Config::get('mysiteVars.timezone');
        $room->updated_at = \Carbon\Carbon::now($timezone);
        $room->save(['timestamps' => FALSE]);
       
        $room->update($request->all());
        return redirect()->route('rooms.main')
                             ->with('success', 'Room Main updated successfully');
      }  
      return redirect()->route('rooms.main');                     

    }
    
    public function detail_list()
    {
        // $rooms = RoomDetail::with('RoomMain')->orderBy('id', 'asc')
        //                         // ->where('lang','EN')
        //                         ->get();

        $rooms = RoomMain::orderBy('id', 'asc')
                                // ->where('lang','EN')
                                ->get();

        $details = RoomDetail::orderBy('lang','asc')->orderBy('order', 'asc')
        // ->where('lang','EN')
        ->get();

            
                   

         return view ('roomdetail.list',compact('rooms'),compact('details'));
    }

    public function detail_edit($id)
    {
        
        //                        
        $details = RoomDetail::findOrFail($id);

         // dd($details);
          return view ('roomdetail.edit',compact('details'));
          

            
                   

         // return view ('roomdetail.list',compact('rooms'),compact('details'));
    }

    public function detail_update(Request $request,$id)
    {
        //
     $niceNames = [
        'text' => 'Text',
        'order' => 'Order',      
        'lang' => 'Language',                 
        'icon' => 'Icon',            

        ]; 

         $request->validate([
            // 'lang' => 'Language',
            // 'text' => 'Text',
            // 'order' => 'Order',            
            // 'icon' => 'Icon', 
            // 'filephoto' => 'required|image|max:2048'
            
        ],[],$niceNames);

        // $room = Room::findOrFail($id);
         $details = RoomDetail::findOrFail($id);
        if (Auth::check()) {
             $request->request->add(['updated_by' => Auth::user()->name]);


     $details->update($request->all());
        return redirect()->route('rooms.detail.list')
                             ->with('success', 'Room created successfully');
      }  
             
    }  


    public function detail_delete(Request $request,$id)
    {

         $details = RoomDetail::findOrFail($id);
         $details->delete();
         return redirect()->route('rooms.detail.list')
                             ->with('danger', 'Room Deleted successfully');
    }

    public function detail_create()
    {
        $mains = RoomMain::orderBy('id', 'asc')->get();
        return view('roomdetail.create',compact('mains'));
    }

    public function detail_store(Request $request)
    {
        //
         $niceNames = [
        'text' => 'Text',
        'order' => 'Order',      
        'lang' => 'Language',                 
        'icon' => 'Icon',            

        ]; 

         $request->validate([
            // 'lang' => 'Language',
            // 'text' => 'Text',
            // 'order' => 'Order',            
            // 'icon' => 'Icon', 
            // 'filephoto' => 'required|image|max:2048'
            
        ],[],$niceNames);

       
            $request->request->add(['created_by' => Auth::user()->name]);
            RoomDetail::create($request->all());
            return redirect()->route('rooms.detail.list')
                             ->with('success', 'Room Detail created successfully');

    }


}
