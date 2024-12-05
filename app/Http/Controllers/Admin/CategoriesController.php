<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // hamf khoi tao cua huong doi tuong (oop), chay dau tien 
    public function __construct()
    {
        // checkquyen
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.quanlydanhmuc.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quanlydanhmuc.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $category = Categories::create($request->all());

        // Kiểm tra nếu không có đối tượng được tạo ra
        if (!$category) {
            return redirect()->back()->with('error', 'Error creating category');
        }

        return redirect('cate_mananger')->with('success', 'Category created successfully');
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
        $category = Categories::find($id);

        // Kiểm tra xem danh mục có tồn tại không
        if (!$category) {
            return redirect('cate_mananger')->with('error', 'Category not found');
        }

        return view('admin.quanlydanhmuc.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesRequest $request, string $id)
    {
        $category = Categories::find($id);

        // Kiểm tra nếu danh mục không tồn tại
        if (!$category) {
            return redirect('cate_mananger')->with('error', 'Category not found');
        }

        $category->update($request->all());

        return redirect('cate_mananger')->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect('cate_mananger')->with('success', 'Category deleted successfully');
    }
}
