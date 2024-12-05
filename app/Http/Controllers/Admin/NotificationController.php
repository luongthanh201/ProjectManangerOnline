<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotifyRequest;
use App\Models\Notify;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifies = Notify::with('user')->get();
        return view('admin.quanlythongbao.list', compact('notifies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quanlythongbao.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotifyRequest $request)
    {
        $notify = Notify::create( $request->all());

        if (!$notify) {
            return redirect()->back()->with('error', 'Error creating notify');
        }
        return redirect('notify_mananger')->with('success', 'Notify created successfully');
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
        $notify = Notify::find($id);
        // Kiểm tra xem danh mục có tồn tại không
        if (!$notify) {
            return redirect('cate_mananger')->with('error', 'Notify not found');
        }

        return view('admin.quanlythongbao.edit', compact('notify'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotifyRequest $request, string $id)
    {
        $notify = Notify::find($id);
        // Kiểm tra nếu danh mục không tồn tại
        if (!$notify) {
            return redirect('cate_mananger')->with('error', 'Notify not found');
        }

        $notify->update($request->all());

        return redirect('notify_mananger')->with('success', 'Notify updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
