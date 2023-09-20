<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);

            return $next($request);
        });
    }

    public function index()
    {

        $products = Product::paginate(10);

        $productImages = Image::all();

        return view('admin.product.index', compact('products', 'productImages'));
    }

    public function create()
    {
        $categories = Category::all();

        $mainCats = MainCategory::all();

        return view('admin.product.create', compact('categories', 'mainCats'));
    }

    public function store(Request $request)
    {

        $categories = Category::all();

        $mainCats = MainCategory::all();

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'max:999999999.99'],
                'discount' => ['required', 'numeric', 'max:99.99'],
                'product_code' => ['required', 'string', 'max:128'],
                'images' => ['required', 'array', 'max:6'],
                'images.*' => ['image', 'mimes:jpeg,png,jpg,gif'],
                'description' => ['required', 'string', 'min:10', 'max:512'],
                'detail' => ['required', 'string', 'min:10', 'max:2048'],
                'cat_id' => ['required'],
                'status' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không ít hơn :min ký tự',
                'max' => ':attribute không vượt quá :max ký tự',
                'mimes' => ':attribute phải có đuôi .jpeg, .png, .jpg, .gif',
                'images.*.images' => 'Tệp :attribute phải là một hình ảnh.',
                'images.*.mimes' => 'Tệp :attribute phải có đuôi .jpeg, .png, .jpg, .gif',
                'numeric' => ':attribute phải là một số'
            ],
            [
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'discount' => 'Giảm giá',
                'product_code' => 'Mã sản phẩm',
                'images' => 'Ảnh sản phẩm',
                'description' => 'Mô tả sản phẩm',
                'detail' => 'Chi tiết sản phẩm',
                'cat_id' => 'Danh mục',
                'status' => 'Trạng thái'
            ]
        );

        $images = $request->file('images');
        $avatarName = time() . '_' . $images[0]->getClientOriginalName();

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'detail' => $request->input('detail'),
            'avatar' => 'uploads/products/' . $avatarName,
            'cat_id' => $request->input('cat_id'),
            'status' => $request->input('status'),
        ]);


        foreach ($images as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('uploads/products'), $imageName);

            Image::create([
                'img_url' => 'uploads/products/' . $imageName,
                'product_id' => $product->id
            ]);
        }
        session()->flash('status', 'Thêm mới thành công!');
        return view('admin.product.create', compact('categories', 'mainCats'))
            ->with('status', 'Thêm mới thành công!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    /*
     *|--------------------------------------------------
     * Controller of Category Management
     *|--------------------------------------------------
     */

    public function category()
    {

        $mainCats = MainCategory::all();

        $categories = Category::paginate(10);

        return view('admin.product.category', compact('mainCats', 'categories'));
    }

    public function createCategory(Request $request)
    {

        $mainCats = MainCategory::all();

        $request->validate(
            [
                'name' => ['required', 'max:128'],
                'main_cat_id' => ['required']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'name' => 'Tên danh mục',
                'main_cat_id' => 'Danh mục cha'
            ]
        );

        Category::create(
            [
                'name' => $request->input('name'),
                'main_cat_id' => $request->input('main_cat_id'),
            ]
        );

        $categories = Category::paginate(10);

        return view('admin.product.category', compact('request', 'mainCats', 'categories'))->with('success', 'Thêm mới thành công!');
    }

    public function mainCategory()
    {

        $mainCats = MainCategory::paginate(10);

        return view('admin.product.mainCategory', compact('mainCats'));
    }

    public function createMainCategory(Request $request)
    {
        $request->validate(
            [
                'cat_name' => ['required', 'max:128']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'cat_name' => 'Tên danh mục'
            ]
        );

        MainCategory::create(
            [
                'name' => $request->input('cat_name'),
            ]
        );

        $mainCats = MainCategory::paginate(10);

        return view('admin.product.mainCategory', compact('request', 'mainCats'))->with('success', 'Thêm mới thành công!');
    }
}
