<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Str;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Comment';
        $data['data'] = Comment::select('comment.*','blog.name as blog_name','users.name as user_name')->leftJoin('blog','blog.id','comment.blog_id')->leftJoin('users','users.id','comment.user_id')->get();
        return view('admin.comment.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Comment';
        $data['user_list'] = User::where('active',1)->get();
        $data['blog_list'] = Blog::where('active',1)->get();
        return view('admin.comment.create')->with($data);
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
        $create = Comment::create($param);
        if ($create) 
        {
            toastr()->success('Comment created successfully');
            return redirect('admin/comment');
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
        $data['title'] = "Comment";
        $data['comment_data'] = Comment::where('id',$id)->first();
        $data['user_list'] = User::where('active',1)->get();
        $data['blog_list'] = Blog::where('active',1)->get();
        return view('admin.comment.edit')->with($data);
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
        $update = Comment::where('id',$request->hidden_id)->update($param);

        if($update)
        {
            toastr()->success('Comment updated successfully');
            return redirect('admin/comment');
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
        $delete = Comment::where('id',$id)->delete();

        if ($delete)
        {
            return response()->json(['status' => 'Success']);
        }else{
            return response()->json(['status' => 'Error']);
        }
    }

    public function statusChange(Request $request)
    {
        $comment = Comment::where('id',$request->get('id'))->value('active');
        if($comment == 1)
        {
            $update = Comment::where('id',$request->get('id'))->update(['active' => 0]);
        }
        if($comment == 0)
        {
            $comment = Comment::where('id',$request->get('id'))->update(['active' => 1]);
        }
        if($update)
        {
            return response()->json(['status' => 'status_changed']);
        }
    }
}
