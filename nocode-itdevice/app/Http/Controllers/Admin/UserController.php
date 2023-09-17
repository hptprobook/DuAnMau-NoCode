<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $keyword = '';

        if ($status == 'banned') {
            $users = User::where('status', 'banned')->paginate(10);
            $count_user_banned = User::where('status', 'banned')->count();
        } else {
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }

            $users = User::where('name', 'LIKE', "%$keyword%")->paginate(10);
            $count_user_banned = 0;
        }

        $count_user_active = User::where('status', 'active')->count();

        $count = [$count_user_active, $count_user_banned];

        return view('admin.user.index', compact('users', 'keyword', 'count'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute chỉ tối đa :max ký tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',
                'unique' => ':attribute đã tồn tại'
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]
        );

        $role = $request->input('role', 'user');

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $role,
        ]);

        return redirect()->route('admin.user.create', compact('request'))->with('success', 'Thêm mới thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::id() != $id) {
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', 'Không tìm thấy người dùng');
            }

            $user->delete();

            return redirect()->route('admin.user.index')->with('success', 'Xóa người dùng thành công');
        } else return redirect()->route('admin.user.index')->with('error', 'Bạn không thể tự xóa mình ra khỏi hệ thống');
    }
}
