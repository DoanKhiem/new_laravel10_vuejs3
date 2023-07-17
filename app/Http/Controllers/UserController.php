<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function show(string $id)
    {
        return  User::findOrFail($id);
    }
    public function index()
    {
        $users = User::join('departments', 'users.department_id', '=', 'departments.id')
        ->join('user_status', 'user_status.id', '=', 'users.status_id')
        ->select(
            'users.*',
             'departments.name as name_department',
              'user_status.name as name_status'
              )
        ->get();
        return response()->json($users);
    }

    public function create() {
        $user_status = \DB::table('user_status')->select(
            'id as value',
            'name as label'
        )->get();
        $departments = \DB::table('departments')->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            'user_status' => $user_status,
            'departments' => $departments,
        ]);
    }
    public function edit($id) {
        $user = User::find($id);
        $user_status = \DB::table('user_status')->select(
            'id as value',
            'name as label'
        )->get();
        $departments = \DB::table('departments')->select(
            'id as value',
            'name as label'
        )->get();
        return response()->json([
            'user' => $user,
            'user_status' => $user_status,
            'departments' => $departments,
        ]);
    }
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'user_name' => 'required|unique:users,user_name',
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'password_confirmation' => 'required|confirmed',
        //     'department_id' => 'required',
        //     'status_id' => 'required', 
        // ],[
        //     'user_name.required' => 'Nhập tài khoản',
        //     'user_name.unique' => 'Tên tài khoản đã tồn tại',
        //     'name.required' => 'Nhập tên',
        //     'email.required' => 'Nhập email',
        //     'email.email' => 'Email không hợp lệ',
        //     'password.required' => 'Nhập mật khẩu',
        //     'password_confirmation.required' => 'Nhập mật khẩu xác nhận',
        //     'password_confirmation.confirmed' => 'Nhập mật khẩu xác nhận',
        //     'department_id.required' => 'Nhập phòng ban',
        //     'status_id.required' => 'Nhập tình trạng',
        // ]);
        // Validate and store the blog post...
 
        // $post = /** ... */
        $user = $request->except(['password', 'password_confirmation']);
        $user['password'] = Hash::make($request['password']);
        User::create($user);
        // User::create([
        //     'user_name' => $request['user_name'],
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     // 'password_confirmation' => Hash::make($request['password_confirmation']),
        //     'department_id' => $request['department_id'],
        //     'status_id' => $request['status_id'],
        // ]);
 
        // return $request;
    }
}
