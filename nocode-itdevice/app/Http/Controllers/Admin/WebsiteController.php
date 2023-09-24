<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'website']);

            return $next($request);
        });
    }

    public function info()
    {

        $website = Website::all()[0];

        return view('admin.website.info', compact('website'));
    }

    public function image()
    {
        return view('admin.website.image');
    }

    public function updateInfo(Request $request)
    {

        $request->validate(
            [
                'title' => ['max:100'],
                'description' => ['max:255'],
                'phone-support' => ['max:11'],
                'email-support' => ['max:255', 'email'],
                'care-phone' => ['max:11'],
                'hotline' => ['max:11'],
                'facebook' => ['max:255'],
                'zalo' => ['max:255']
            ],
            [
                'max' => ':attribute không vượt quá :max ký tự',
                'email' => ':attribute phải là email',
            ],
            [
                'title' => 'Tiêu đề Website',
                'description' => 'Mô tả tìm kiếm',
                'phone-support' => 'SDT hỗ trợ KH',
                'email-support' => 'Email CSKH',
                'care-phone' => 'SDT CSKH',
                'hotline' => 'Hotline',
                'facebook' => 'Facebook URL',
                'zalo' => 'Zalo'
            ]
        );

        $website = Website::where('id', 1)->update(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'support_phone' => $request->input('phone-support'),
                'support_email' => $request->input('email-support'),
                'care_phone' => $request->input('care-phone'),
                'hotline' => $request->input('hotline'),
                'facebook' => $request->input('facebook'),
                'zalo' => $request->input('zalo'),
            ]
        );

        return redirect()->route('admin.website.info', compact('website'))->with('success', 'Cập nhật thông tin thành công!');
        // return view('admin.website.info');
    }

    public function updateImages(Request $request)
    {
    }
}
