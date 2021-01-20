<?php

namespace App\Http\Controllers;

use DB;
// use Illuminate\Http\Request;
// use DB;
// use App\Room;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\SubCategory;
use App\Product;
use App\Category;
use App\RoomDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $subcatee = SubCategory::where('cateId',$xx)->get();


        $pros = SubCategory::with('subCategories_product', 'subCategories_Category')
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
        //Log::info($data);
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
       
        $edit = Category::where('cateId', $id)->first();


        return view('category.edit', compact('edit'));
     
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

   

    

   

  

  


   
}
