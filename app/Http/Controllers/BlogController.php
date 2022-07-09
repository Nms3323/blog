<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Str;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Blog';
        $data['data'] = Blog::select('blog.*','users.name as user_name')->leftJoin('users','users.id','blog.user_id')->get();
        return view('admin.blog.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Blog';
        $data['user_list'] = User::where('active',1)->get();
        return view('admin.blog.create')->with($data);
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
        unset($param['_token']);
        $create = Blog::create($param);
        if ($create) 
        {
            toastr()->success('Blog created successfully');
            return redirect('admin/blog');
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
        $data['title'] = "Blog";
        $data['blog_data'] = Blog::where('id',$id)->first();
        $data['user_list'] = User::where('active',1)->get();
        return view('admin.blog.edit')->with($data);
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
        unset($param['_method'],$param['_token'],$param['hidden_id']);
        $update = Blog::where('id',$request->hidden_id)->update($param);

        if($update)
        {
            toastr()->success('Blog updated successfully');
            return redirect('admin/blog');
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
        $delete = Blog::where('id',$id)->delete();

        if ($delete)
        {
            return response()->json(['status' => 'Success']);
        }else{
            return response()->json(['status' => 'Error']);
        }
    }

    public function statusChange(Request $request)
    {
        $blog = Blog::where('id',$request->get('id'))->value('active');
        if($blog == 1)
        {
            $update = Blog::where('id',$request->get('id'))->update(['active' => 0]);
        }
        if($blog == 0)
        {
            $blog = Blog::where('id',$request->get('id'))->update(['active' => 1]);
        }
        if($update)
        {
            return response()->json(['status' => 'status_changed']);
        }
    }
}
