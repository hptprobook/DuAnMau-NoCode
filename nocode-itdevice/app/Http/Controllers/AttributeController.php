<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'attribute']);

            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'max:191']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'name' => 'Tên thuộc tính'
            ]
        );

        Attribute::create(
            [
                'name' => $request->input('name'),
            ]
        );

        $attributes = Attribute::simplePaginate(10);

        return redirect()->route('admin.attribute.index', compact('attributes'))->with('success', 'Thêm mới thành công!');
    }

    public function add(string $id)
    {

        $product = Product::find($id);

        $attributes = Attribute::all();

        return view('admin.attribute.add', compact('product', 'attributes'));
    }

    public function list(string $id)
    {
        $product = Product::find($id);

        $attributeValues = $product->attributeValues;
        $relatedAttributes = $product->relatedAttributes;

        return view('admin.attribute.list', compact('product', 'attributeValues', 'relatedAttributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'value' => ['required', 'max:191']
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không vượt quá :max ký tự'
            ],
            [
                'value' => 'Giá trị thuộc tính'
            ]
        );

        AttributeValue::create(
            [
                'attribute_id' => $request->input('attribute_id'),
                'product_id' => $request->input('product_id'),
                'value' => $request->input('value')
            ]
        );

        return redirect()->route('admin.product.index', compact('request'))->with('success', 'Thêm thuộc tính thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
