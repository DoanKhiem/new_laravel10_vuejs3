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
}
