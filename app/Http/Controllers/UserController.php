<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'User';
        $data['data'] = User::get();
        return view('admin.user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'User';
        return view('admin.user.create')->with($data);
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
        $param['password'] = md5($param['password']);
        $create = User::create($param);
        if ($create) 
        {
            toastr()->success('User created successfully');
            return redirect('admin/user');
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
        $data['title'] = "User";
        $data['user_data'] = User::where('id',$id)->first();
        return view('admin.user.edit')->with($data);
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
        $update = User::where('id',$request->hidden_id)->update($param);

        if($update)
        {
            toastr()->success('User updated successfully');
            return redirect('admin/user');
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
        $delete = User::where('id',$id)->delete();

        if ($delete)
        {
            return response()->json(['status' => 'Success']);
        }else{
            return response()->json(['status' => 'Error']);
        }
    }

    public function checkemail(Request $request)
    {
        $param = $request->all();
        if($param['email'] != ""){
            if(isset($param['id'])){
                if($param['id'] > 0){
                    $check = User::where('email',$param['email'])->where('id','!=',$param['id'])->exists();
                }
            }else{
                $check = User::where('email',$param['email'])->exists();
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
        $user = User::where('id',$request->get('id'))->value('active');
        if($user == 1)
        {
            $update = User::where('id',$request->get('id'))->update(['active' => 0]);
        }
        if($user == 0)
        {
            $update = User::where('id',$request->get('id'))->update(['active' => 1]);
        }
        if($update)
        {
            return response()->json(['status' => 'status_changed']);
        }
    }
}
