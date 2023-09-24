<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\ChildCategory;
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

    public function index(Request $request)
    {

        $categories = Category::all();
        $mainCats = MainCategory::all();
        $childCats = ChildCategory::all();
        $status = $request->input('status');
        $keyword = '';
        $count_products_in_stock = 0;
        $count_products_in_stock = Product::where('status', 0)->count();

        if ($status == 'outOfStock') {
            $products = Product::where('status', 1)->simplePaginate(10);
        } elseif ($status == 'inStock') {
            $products = Product::where('status', 0)->simplePaginate(10);
        } else {
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }

            $products = Product::where('name', 'LIKE', "%$keyword%")->simplePaginate(10);
        }

        $count_products_out_of_stock = Product::where('status', 1)->count();

        $count = [$count_products_in_stock, $count_products_out_of_stock];

        $productImages = Image::all();

        return view('admin.product.index', compact('products', 'productImages', 'keyword', 'count', 'categories', 'mainCats', 'childCats'));
    }

    public function create()
    {
        $categories = Category::all();
        $mainCats = MainCategory::all();
        $childCats = ChildCategory::all();

        return view('admin.product.create', compact('categories', 'mainCats', 'childCats'));
    }

    public function store(Request $request)
    {

        $categories = Category::all();

        $mainCats = MainCategory::all();

        $childCats = ChildCategory::all();

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
        return view('admin.product.create', compact('categories', 'mainCats', 'childCats'))
            ->with('status', 'Thêm mới thành công!');
    }

    public function action(Request $request)
    {
        $list_check = $request->input('list_check');

        if (empty($list_check)) {
            return redirect('admin/product')->with('error', 'Không có bản ghi nào được chọn');
        }

        $act = $request->input('act');

        if ($act == 'delete') {

            foreach ($list_check as $id) {
                $images = Product::find($id)->images;

                foreach ($images as $image) {
                    $image->delete();
                }
            }

            Product::destroy($list_check);
            return redirect('admin/product')->with('success', 'Bạn đã xóa thành công');
        }

        if ($act == 'inStock') {
            Product::whereIn('id', $list_check)->update(['status' => 0]);
            return redirect('admin/product')->with('success', 'Bạn đã xác nhận còn hàng thành công');
        }

        if ($act == 'outOfStock') {
            Product::whereIn('id', $list_check)->update(['status' => 1]);
            return redirect('admin/product')->with('success', 'Bạn đã xác nhận hết hàng thành công');
        }

        return redirect('admin/product')->with('error', 'Có lỗi trong quá trình xử lý');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $childCats = ChildCategory::all();
        $mainCats = MainCategory::all();

        return view('admin.product.edit', compact('product', 'categories', 'mainCats', 'childCats'));
    }

    public function update(Request $request, string $id)
    {
        $categories = Category::all();

        $mainCats = MainCategory::all();

        $childCats = ChildCategory::all();

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'max:999999999.99'],
                'discount' => ['required', 'numeric', 'max:99.99'],
                'product_code' => ['required', 'string', 'max:128'],
                'images' => ['array', 'max:6'],
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

        if ($request->file('images')) {

            $images = $request->file('images');
            $avatarName = time() . '_' . $images[0]->getClientOriginalName();

            $product = Product::where('id', $id)->update([
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

                Image::where('product_id', $id)->update([
                    'img_url' => 'uploads/products/' . $imageName,
                    'product_id' => $id
                ]);
            }
        } else {
            $product = Product::where('id', $id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'product_code' => $request->input('product_code'),
                'description' => $request->input('description'),
                'detail' => $request->input('detail'),
                'cat_id' => $request->input('cat_id'),
                'status' => $request->input('status'),
            ]);
        }

        session()->flash('status', 'Chỉnh sửa thành công!');
        return view('admin.product.create', compact('categories', 'mainCats', 'childCats', 'request'))
            ->with('status', 'Chỉnh sửa thành công!');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product.index')->with('error', 'Không tìm thấy sản phẩm');
        }

        $images = Product::find($id)->images;

        foreach ($images as $image) {
            $image->delete();
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function images(string $id)
    {

        $product = Product::find($id);

        $images = Product::find($id)->images;

        return view('admin.product.images', compact('product', 'images'));
    }

    public function updateImage(Request $request, string $id)
    {

        $product = Product::find($id);

        $images = Product::find($id)->images;
        $img_urls = $request->file('img_url');
        $img_titles = $request->input('img_title');
        $img_alts = $request->input('img_alt');

        $request->validate([
            'img_title.*' => ['max:255'],
            'img_alt.*' => ['max:100']
        ], [
            'max' => ':attribute không được vượt quá :max ký tự'
        ], [
            'img_title.*' => 'Tiêu đề ảnh',
            'img_alt.*' => 'Văn bản thay thế'
        ]);

        foreach ($images as $key => $image) {
            if (isset($img_titles[$key]) && isset($img_alts[$key])) {

                if (isset($img_urls[$key])) {
                    if (isset($img_urls[0])) {
                        $avatarName = time() . '_' . $img_urls[0]->getClientOriginalName();

                        Product::where('id', $id)->update([
                            'avatar' => 'uploads/products/' . $avatarName
                        ]);
                    }

                    $imageName = time() . '_' . $img_urls[$key]->getClientOriginalName();
                    $img_urls[$key]->move(public_path('uploads/products'), $imageName);

                    Image::where('id', $image->id)->update([
                        'img_url' => 'uploads/products/' . $imageName,
                        'img_alt' => $img_alts[$key],
                        'img_title' => $img_titles[$key]
                    ]);
                } else {
                    Image::where('id', $image->id)->update([
                        'img_alt' => $img_alts[$key],
                        'img_title' => $img_titles[$key]
                    ]);
                }
            }
        }
        $images = Product::find($id)->images;
        session()->flash('success', 'Thao tác thành công!');
        return view('admin.product.images', compact('request', 'images', 'product', 'img_urls'));
    }

    /*
     *|--------------------------------------------------
     * Controller of Category Management
     *|--------------------------------------------------
     */

    public function childCategory()
    {

        $mainCats = MainCategory::all();
        $categories = Category::all();
        $childCats = ChildCategory::simplePaginate(10);

        return view('admin.product.childCategory', compact('mainCats', 'categories', 'childCats'));
    }

    public function createChildCategory(Request $request)
    {
        $mainCats = MainCategory::all();
        $categories = Category::all();

        $request->validate(
            [
                'name' => ['required', 'max:128'],
                'cat_id' => ['required']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'name' => 'Tên danh mục',
                'cat_id' => 'Danh mục'
            ]
        );

        ChildCategory::create(
            [
                'name' => $request->input('name'),
                'cat_id' => $request->input('cat_id'),
            ]
        );

        $childCats = ChildCategory::simplePaginate(10);

        return view('admin.product.childCategory', compact('mainCats', 'categories', 'childCats'));
    }

    public function editChildCat(string $id)
    {
        $childCat = ChildCategory::find($id);
        $mainCats = MainCategory::all();
        $categories = Category::all();

        return view('admin.product.editChildCat', compact('childCat', 'mainCats', 'categories'));
    }

    public function updateChildCat(Request $request, string $id)
    {
        $mainCats = MainCategory::all();
        $categories = Category::all();

        $request->validate(
            [
                'name' => ['required', 'max:128'],
                'cat_id' => ['required']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'name' => 'Tên danh mục',
                'cat_id' => 'Danh mục'
            ]
        );

        ChildCategory::where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'cat_id' => $request->input('cat_id'),
            ]
        );

        $childCats = ChildCategory::simplePaginate(10);

        return view('admin.product.childCategory', compact('childCats', 'mainCats', 'categories'));
    }

    public function deleteChildCat(string $id)
    {

        $mainCats = MainCategory::all();
        $categories = Category::all();

        $childCat = ChildCategory::find($id);

        if (!$childCat) {
            return redirect()->route('admin.product.childCat')->with('error', 'Không tìm thấy sản phẩm');
        }

        $childCat->delete();


        $childCats = ChildCategory::simplePaginate(10);

        return redirect()->route('admin.product.childCategory', compact('childCats', 'mainCats', 'categories'))->with('success', 'Xóa danh mục thành công');
    }

    public function category()
    {

        $mainCats = MainCategory::all();

        $categories = Category::simplePaginate(10);

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

        $categories = Category::simplePaginate(10);

        return view('admin.product.category', compact('request', 'mainCats', 'categories'))->with('success', 'Thêm mới thành công!');
    }

    public function editCategory(string $id)
    {

        $mainCats = MainCategory::all();
        $category = Category::find($id);

        $categories = Category::simplePaginate(10);

        return view('admin.product.editCategory', compact('mainCats', 'categories', 'category'));
    }

    public function updateCategory(Request $request, string $id)
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
                'main_cat_id' => 'Danh mục'
            ]
        );

        Category::where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'main_cat_id' => $request->input('main_cat_id'),
            ]
        );
        $categories = Category::simplePaginate(10);

        return view('admin.product.category', compact('mainCats', 'categories'));
    }

    public function deleteCategory(string $id)
    {
        $mainCats = MainCategory::all();

        $Category = Category::find($id);

        if (!$Category) {
            return redirect()->route('admin.product.category')->with('error', 'Không tìm thấy sản phẩm');
        }

        $Category->delete();

        $categories = Category::simplePaginate(10);

        return view('admin.product.editCategory', compact('mainCats', 'categories'));
    }

    public function mainCategory()
    {

        $mainCats = MainCategory::simplePaginate(10);

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

        $mainCats = MainCategory::simplePaginate(10);

        return view('admin.product.mainCategory', compact('request', 'mainCats'))->with('success', 'Thêm mới thành công!');
    }

    public function editMainCat(string $id)
    {

        $mainCat = MainCategory::find($id);

        $mainCats = MainCategory::simplePaginate(10);

        return view('admin.product.editMainCat', compact('mainCats', 'mainCat'));
    }

    public function updateMainCat(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => ['required', 'max:128']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'name' => 'Tên danh mục'
            ]
        );

        MainCategory::where('id', $id)->update(
            [
                'name' => $request->input('name'),
            ]
        );
        $mainCats = MainCategory::simplePaginate(10);

        return view('admin.product.mainCategory', compact('mainCats'));
    }

    public function deleteMainCat(string $id)
    {

        $mainCat = MainCategory::find($id);

        if (!$mainCat) {
            return redirect()->route('admin.product.mainCategory')->with('error', 'Không tìm thấy sản phẩm');
        }

        $mainCat->delete();

        $mainCats = MainCategory::simplePaginate(10);

        return view('admin.product.mainCategory', compact('mainCats'));
    }
}
