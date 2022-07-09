<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Category';
        $data['data'] = Category::get();
        return view('admin.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        
        $param['slug'] = Str::slug($param['category_name']);
        $create = Category::create($param);
        if ($create) 
        {
            toastr()->success('Category added successfully');
            return redirect()->back();
        } 
        else 
        {
            toastr()->error('Something went wrong');
            return redirect()->back();
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
        $data['title'] = "Category";
        $data['category_data'] = Category::where('id',$id)->first();
        return response()->json($data);
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
        $param = $request->all();
        unset($param['_method'],$param['_token'],$param['category_hidden_id']);
        $param['slug'] = Str::slug($param['category_name']);
        $update = Category::where('id',$request->category_hidden_id)->update($param);

        if($update)
        {
            toastr()->success('Category updated successfully');
            return redirect()->back();
        }
        else
        {
            toastr()->error('Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::where('id',$id)->delete();

        if ($delete)
        {
            toastr()->success('Category deleted successfully');
            return response()->json(['status' => 'Success']);
        }else{
            toastr()->error('Something went wrong');
            return response()->json(['status' => 'Error']);
        }
    }

    public function checkCatName(Request $request)
    {
        $param = $request->all();
        if($param['category_name'] != ""){
            $param['slug'] = Str::slug($param['category_name']);
            if(isset($param['id'])){
                if($param['id'] > 0){
                    $check = Category::where('slug',$param['slug'])->where('id','!=',$param['id'])->exists();
                }
            }else{
                $check = Category::where('slug',$param['slug'])->exists();
            }

            if($check){
                echo json_encode(false);
            }else{
                echo json_encode(true);
            }
        }
    }

    public function statusChange(Request $request)
    {
        $category = Category::where('id',$request->get('id'))->value('active');
        if($category == 1)
        {
            $update = Category::where('id',$request->get('id'))->update(['active' => 0]);
        }
        if($category == 0)
        {
            $update = Category::where('id',$request->get('id'))->update(['active' => 1]);
        }
        if($update)
        {
            return response()->json(['status' => 'status_changed']);
        }
    }
}
