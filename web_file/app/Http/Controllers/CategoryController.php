<?php

namespace App\Http\Controllers;

use DB;
// use Illuminate\Http\Request;
// use DB;
// use App\Room;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
use App\Category;
use App\subCategory;
use App\RoomDetail;
use App\Http\Controllers\Controller;

use Auth;
use Image;

class CategoryController extends Controller
{
    private $x;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $mains = RoomMain::orderBy('id', 'asc')->get();
        return view('category.create');
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
            'cateName' => 'Category Name',
            // 'price' => 'Room Price',
            // 'description' => 'Description',     
            // 'name_th' => 'Room Name Thai',            
            // 'name_ch' => 'Room Name China',
            // 'description_th' => 'Description Thai',                      
            // 'description_ch' => 'Description China',                      

        ];

        $request->validate([
            'cateName' => 'required',
            // 'name_th' => 'required',
            // 'name_ch' => 'required',
            // 'price' => 'required',
            // 'description' => 'required',
            // 'description_th' => 'required',
            // 'description_ch' => 'required',

        ], [], $niceNames);

        if (Auth::check()) {
            $request->request->add(['cateCreated_by' => Auth::user()->name]);

            Category::create($request->all());
            return redirect()->route('category.list')
                ->with('success', 'Category created successfully');
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

        // $pros = Category::with('products','subCategories')->where('cateId',$id)->get();



        $pros = Category::with(['products' => function ($q) {
            $q->orderBy('proId', 'DESC');
        }], 'subCategories')->where('cateId', $id)
            ->get();

        if (request()->has('sort')) {
            if (request('sort') == 1) {
                $pros = Category::with(['products' => function ($q) {
                    $q->orderBy('proId', 'DESC');
                }], 'subCategories')->where('cateId', $id)
                    ->get();
            } else if (request('sort') == 2) {
                $pros = Category::with(['products' => function ($q) {
                    $q->orderBy('proName');
                }], 'subCategories')->where('cateId', $id)
                    ->get();
            } else if (request('sort') == 3) {
                $pros = Category::with(['products' => function ($q) {
                    $q->orderBy('proPrice', 'desc');
                }], 'subCategories')->where('cateId', $id)
                    ->get();
            } else if (request('sort') == 4) {
                $pros = Category::with(['products' => function ($q) {
                    $q->orderBy('proPrice', 'asc');
                }], 'subCategories')->where('cateId', $id)
                    ->get();
            }
        }
        // $pros = Product::where('cateId',$id)->get();
        return view('category.show', compact('pros'));
    }


    public function subCate_show($xx,$xid)
    {
        //$this->x = $xx;

        $category = Category::with('products', 'subCategories')->where('cateId', $xid)->get();
        $subcatee = subCategory::where('cateId',$xx)->get();


        $pros = subCategory::with('subCategories_product', 'subCategories_Category')
            ->where('subCateId', $xid)
            ->get();




        // if (request()->has('sort')) {
        //     if (request('sort') == 1) {
        //         $pros = subCategory::with(['subCategories_product' => function ($q) {
        //             $q->orderBy('proId', 'DESC');
        //         }], 'subCategories_Category')->where('cateId', $id)
        //             ->get();
        //     } else if (request('sort') == 2) {
        //         $pros = subCategory::with(['subCategories_product' => function ($q) {
        //             $q->orderBy('proName', 'DESC');
        //         }], 'subCategories_Category')->where('cateId', $id)
        //             ->get();
        //     } else if (request('sort') == 3) {
        //         $pros = subCategory::with(['subCategories_product' => function ($q) {
        //             $q->orderBy('proPrice', 'DESC');
        //         }], 'subCategories_Category')->where('cateId', $id)
        //             ->get();
        //     } else if (request('sort') == 4) {
        //         $pros = subCategory::with(['subCategories_product' => function ($q) {
        //             $q->orderBy('proPrice', 'asc');
        //         }], 'subCategories_Category')->where('cateId', $id)
        //             ->get();
        //     }
        // }

       return view('category/subcategory.show', compact('pros', 'category','subcatee'));
        
    }

    public function subCate($cateId)
    {
        $data = SubCategory::where('cateId', $cateId)->get();
        \Log::info($data);
        return response()->json(['data' => $data]);
    }

    public function subCate_edit($id)
    {
        $cates = Category::orderBy('cateId', 'desc')->get();
        $edit = SubCategory::where('subCateId', $id)->first();
        return view('category/subcategory.edit', compact('edit', 'cates'));
        //       dd($edit);

    }

    public function subCate_update(Request $request, $id)
    {
        $subcate = SubCategory::where('subCateId', $id)->first();
        $subcate->update($request->all());
        return redirect()->route('category.list')
            ->with('success', 'Sub Category Update successfully');
    }

    public function subCate_destroy($id)
    {
        $subcate = SubCategory::where('subCateId', $id)->first();
        $subcate->destroy($id);
        return redirect()->route('category.list')
            ->with('warning', 'Sub Category Deleted successfully');
    }



    public function subCate_create()
    {
        // $mains = RoomMain::orderBy('id', 'asc')->get();
        $cates = Category::orderBy('cateId', 'desc')->get();
        return view('category/subcategory.create', compact('cates'));
    }

    public function subCate_store(Request $request)
    {
        $niceNames = [
            // 'cateName' => 'Category Name',
            // 'price' => 'Room Price',
            // 'description' => 'Description',     
            // 'name_th' => 'Room Name Thai',            
            // 'name_ch' => 'Room Name China',
            // 'description_th' => 'Description Thai',                      
            // 'description_ch' => 'Description China',                      

        ];

        $request->validate([
            // 'cateName' => 'required',
            // 'name_th' => 'required',
            // 'name_ch' => 'required',
            // 'price' => 'required',
            // 'description' => 'required',
            // 'description_th' => 'required',
            // 'description_ch' => 'required',

        ], [], $niceNames);

        if (Auth::check()) {
            $request->request->add(['cateCreated_by' => Auth::user()->name]);

            SubCategory::create($request->all());
            return redirect()->route('category.list')
                ->with('success', 'Category created successfully');
        }
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
        // $edit = Category::where('cateId','$id')->first();
        $edit = Category::where('cateId', $id)->first();


        return view('category.edit', compact('edit'));
        //       dd($edit);

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

        $niceNames = [];

        $request->validate([
            'cateName' => 'required',


        ], [], $niceNames);

        $cate = Category::where('cateId', $id)->first();;
        if (Auth::check()) {
            //  $request->request->add(['updated_by' => Auth::user()->name]);






            $cate->update($request->all());
            return redirect()->route('category.list')
                ->with('success', 'Category Update successfully');
        }
        return redirect()->route('category.list');
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
        // $cate = Category::where('cateId',$id)->first();
        $edit = Category::where('cateId', $id)->first();
        $edit->delete();
        return redirect()->route('category.list')
            ->with('success', 'category deleted successfully');
        // dd($edit);
    }

    public function list()
    {
        $cates = Category::orderBy('cateOrderBy', 'asc')->get();
        // $subcates = Category::with('products','subCategories')->where('cateId',$cates[0]->cateId)->get();
        $subcates = SubCategory::orderBy('cateId', 'asc')->get();
        // DB::table('category')->orderBy('cateId','asc')->get();
        return view('category.list', compact('cates', 'subcates'));

        //return view ('rooms.list')->with('rooms',$rooms);
    }

    public function main_index()
    {
        $roommains = DB::table('room_main')->orderBy('id', 'asc')->get();


        return view('roommain.index', compact('roommains'));
    }

    public function main_create()
    {
        return view('roommain.create');
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


        ], [], $niceNames);

        if (Auth::check()) {
            $request->request->add(['created_by' => Auth::user()->name]);


            //Photo1
            // Get filename with extension
            $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();
            // Get jus the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get Extension
            $extention = $request->file('filephoto1')->getClientOriginalExtension();
            // Create new filename
            //$filenameToStore = $filename.'_'.time().'.'.$extention;
            $filenameToStore = 'room_' . $request->input('name') . '.' . $extention;
            $fullpath = public_path('images\\') . $filenameToStore;

            //Resize
            $image = $request->file('filephoto1');
            $img = Image::make($_FILES['filephoto1']['tmp_name']);

            // $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
            $name_thumbnail = $request->input('name') . $extention;
            $fullpath__thumbnail = public_path('images\\') . $name_thumbnail;

            $destinationPath = public_path('\images\thumbnail');

            $img->resize(570, 378, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '\\' . $name_thumbnail);

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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto2')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_2.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto3')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_3.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto4')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_4.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto5')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_5.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto6')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_6.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto7')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_7.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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

        //  $edit = Category::where('cateId','$id');

        //  //dd($edits);
        //  return view ('category.edit',compact('edit'));
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


        ], [], $niceNames);



        $room = RoomMain::findOrFail($id);
        if (Auth::check()) {
            $request->request->add(['updated_by' => Auth::user()->name]);



            // Get filename with extension

            if ($request->hasFile('filephoto1')) {
                $filenameWithExt = $request->file('filephoto1')->getClientOriginalName();

                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto1')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = $request->input('name') . '.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                //Resize
                $image = $request->file('filephoto1');
                $img = Image::make($_FILES['filephoto1']['tmp_name']);

                // echo $_FILES['filephoto1']['tmp_name'];
                // die();


                // $name_thumbnail = 'room_'.$request->input('name').'_thumbnail.'.$extention;
                $name_thumbnail = $request->input('name') . '.' . $extention;
                $fullpath__thumbnail = public_path('images\\thumbnail\\') . $name_thumbnail;

                $destinationPath = public_path('images/thumbnail');

                // echo $destinationPath;
                // die();

                $img->resize(570, 378, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $name_thumbnail);

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
                $fullpath = public_path('images\\') . $room->photo2;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo2 = null;
            } elseif ($request->has('filephoto2')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto2')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto2')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_2.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $fullpath = public_path('images\\') . $room->photo3;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo3 = null;
            } elseif ($request->has('filephoto3')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto3')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto3')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_3.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $fullpath = public_path('images\\') . $room->photo4;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo4 = null;
            } elseif ($request->has('filephoto4')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto4')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto4')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_4.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $fullpath = public_path('images\\') . $room->photo5;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo5 = null;
            } elseif ($request->has('filephoto5')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto5')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto5')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_5.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $fullpath = public_path('images\\') . $room->photo6;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo6 = null;
            } elseif ($request->has('filephoto6')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto6')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto6')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_6.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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
                $fullpath = public_path('images\\') . $room->photo7;
                if (file_exists($fullpath)) {
                    @unlink($fullpath);
                }
                $room->photo7 = null;
            } elseif ($request->has('filephoto7')) {

                // Get filename with extension
                $filenameWithExt = $request->file('filephoto7')->getClientOriginalName();
                // Get jus the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get Extension
                $extention = $request->file('filephoto7')->getClientOriginalExtension();
                // Create new filename
                //$filenameToStore = $filename.'_'.time().'.'.$extention;
                $filenameToStore = 'room_' . $request->input('name') . '_7.' . $extention;
                $fullpath = public_path('images\\') . $filenameToStore;
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

        $details = RoomDetail::orderBy('lang', 'asc')->orderBy('order', 'asc')
            // ->where('lang','EN')
            ->get();




        return view('roomdetail.list', compact('rooms'), compact('details'));
    }

    public function detail_edit($id)
    {

        //                        
        $details = RoomDetail::findOrFail($id);

        // dd($details);
        return view('roomdetail.edit', compact('details'));





        // return view ('roomdetail.list',compact('rooms'),compact('details'));
    }

    public function detail_update(Request $request, $id)
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

        ], [], $niceNames);

        // $room = Room::findOrFail($id);
        $details = RoomDetail::findOrFail($id);
        if (Auth::check()) {
            $request->request->add(['updated_by' => Auth::user()->name]);


            $details->update($request->all());
            return redirect()->route('rooms.detail.list')
                ->with('success', 'Room created successfully');
        }
    }


    public function detail_delete(Request $request, $id)
    {

        $details = RoomDetail::findOrFail($id);
        $details->delete();
        return redirect()->route('rooms.detail.list')
            ->with('danger', 'Room Deleted successfully');
    }

    public function detail_create()
    {
        $mains = RoomMain::orderBy('id', 'asc')->get();
        return view('roomdetail.create', compact('mains'));
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

        ], [], $niceNames);


        $request->request->add(['created_by' => Auth::user()->name]);
        RoomDetail::create($request->all());
        return redirect()->route('rooms.detail.list')
            ->with('success', 'Room Detail created successfully');
    }
}
