<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstCate = Category::all();
        return view('admin.category.list', compact('lstCate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create',[
            'category' => 'Tạo danh mục truyện'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $cate = new Category();
        $cate->title = $data['title'];
        $cate->description = $data['description'];
        $cate->slug = $data['slug'];
        $cate->status = $data['status'];
        $cate->save();
        Session::flash('success', 'Thêm danh mục truyện thành công');
        return redirect()->back();
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
        $cate = Category::find($id);

        return view('admin.category.edit', compact('cate'),[
            'category' => 'Chỉnh sửa mục truyện'
        ]);
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
        $data = $request->all();
        $cate = Category::find($id);
        $cate->title = $data['title'];
        $cate->description = $data['description'];
        $cate->slug = $data['slug'];
        $cate->status = $data['status'];
        $cate->save();
        Session::flash('success', 'Cập danh mục truyện thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Xoá danh mục truyện thành công');
    }
}
