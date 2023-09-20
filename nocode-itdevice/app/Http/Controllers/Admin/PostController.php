<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'post']);

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $posts = Post::paginate(10);
        $keyword = '';

        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }

        $posts = Post::where('title', 'LIKE', "%$keyword%")->paginate(10);

        return view('admin.post.index', compact('posts', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    public function category()
    {
        return view('admin.post.category');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'string', 'max:255', 'min:10'],
                'short_description' => ['required', 'string', 'max:255', 'min:10'],
                'detail' => ['required', 'string', 'max:2000'],
                'image' => ['required', 'file', 'mimes:jpeg,png,jpg,gif'],
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute chỉ tối đa :max ký tự',
                'min' => ':attribute phải có tối thiểu :min ký tự',
                'mimes' => ':attribute phải là định dạng jpeg, png, jpg, hoặc gif'
            ],
            [
                'title' => 'Tiêu đề',
                'short_description' => 'Mô tả',
                'detail' => 'Chi tiết bài viết',
                'image' => 'Ảnh bài viết',
            ]
        );

        $image = $request->file('image');

        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->move(public_path('uploads/posts'), $imageName);

        Post::create([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'detail' => $request->input('detail'),
            'thumbnail' => 'uploads/posts/' . $imageName
        ]);

        return redirect()->route('admin.post.create', compact('request'))->with('success', 'Thêm mới thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $post = Post::find($id);

        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $post = Post::find($id);

        $request->validate(
            [
                'title' => ['required', 'string', 'max:255', 'min:10'],
                'short_description' => ['required', 'string', 'max:255', 'min:10'],
                'detail' => ['required', 'string', 'max:2000'],
                'image' => ['file', 'mimes:jpeg,png,jpg,gif'],
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute chỉ tối đa :max ký tự',
                'min' => ':attribute phải có tối thiểu :min ký tự',
                'mimes' => ':attribute phải là định dạng jpeg, png, jpg, hoặc gif'
            ],
            [
                'title' => 'Tiêu đề',
                'short_description' => 'Mô tả',
                'detail' => 'Chi tiết bài viết',
                'image' => 'Ảnh bài viết',
            ]
        );

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('uploads/posts'), $imageName);

            $imageUrl = 'uploads/posts/' . $imageName;
        } else {
            $imageUrl = $post->thumbnail;
        }



        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
            'detail' => $request->input('detail'),
            'thumbnail' => $imageUrl
        ]);

        return redirect()->route('admin.post.index', compact('request'))->with('success', 'Chỉnh sửa thành công!');
    }

    public function action(Request $request)
    {
        $list_check = $request->input('list_check');

        if ($list_check) {

            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    Post::destroy($list_check);
                    return redirect('admin/post')->with('success', 'Bạn đã xóa thành công');
                } else return redirect('admin/post')->with('error', 'Có lỗi trong quá trình thực hiện!');
            }
        } else {
            return redirect('admin/post')->with('error', 'Không có bản ghi nào được chọn');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('admin.post.index')->with('error', 'Không tìm thấy bài viết');
        }

        $post->delete();

        return redirect()->route('admin.post.index')->with('success', 'Xóa bài viết thành công');
    }
}
