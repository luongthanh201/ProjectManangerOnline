@extends('admin.layout.master')
@section('content')
<div id="categoryModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Update Category</h2>
            <a href="{{url('/cate_mananger')}}">
                <button class="close-btn">
                    <i data-lucide="x"></i>
                </button>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="categoryForm" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="categoryId" name="id" value="{{ $category->id }}">
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3" value="{{ $category->description }}"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Project Count</label>
                <input type="text" id="projectcount" name="projectcount" value="{{ $category->projectcount }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" value="{{ $category->status }}">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-actions">
                <a href="{{url('/cate_mananger')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
    </main>
</div>
@endsection