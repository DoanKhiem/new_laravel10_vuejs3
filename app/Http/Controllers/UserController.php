<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show(string $id)
    {
        return  User::findOrFail($id);
    }
    public function index()
    {
        $users = User::join('departments', 'users.departments_id', '=', 'departments.id')
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|unique:users,user_name',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|confirmed',
            'department_id' => 'required',
            'status_id' => 'required', 
        ],[
            'user_name.required' => 'Nhập tài khoản',
            'user_name.unique' => 'Tên tài khoản đã tồn tại',
            'name.required' => 'Nhập tên',
            'email.required' => 'Nhập email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Nhập mật khẩu',
            'password_confirmation.required' => 'Nhập mật khẩu xác nhận',
            'password_confirmation.confirmed' => 'Nhập mật khẩu xác nhận',
            'department_id.required' => 'Nhập phòng ban',
            'status_id.required' => 'Nhập tình trạng',
        ]);
        // Validate and store the blog post...
 
        // $post = /** ... */
 
        return $request;
    }
}
