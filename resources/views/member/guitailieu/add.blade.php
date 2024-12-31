@extends('member.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Add New Document</h2>
            <a href="{{url('document_submitted')}}">
                <button class="close-btn">
                    <i data-lucide="x"></i>
                </button>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Thông báo!</h4>
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
        <form id="project-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="name">Type:</label>
                <input type="text" name="type" id="type" >
            </div>
            <div class="form-group">
                <label for="file">Upload File:</label>
                <input type="file" name="file_path" id="file_path" >
            </div>
            <div class="form-group">
                <label for="user_id">Creator:</label>
                <input type="text" id="user_id" name="user_id">
            </div>
            <div class="form-group">
                <label for="project_id">Project:</label>
                <input type="text" id="project_id" name="project_id">
            </div>
            <div class="form-group">
                <label for="uploaded_at">Uploaded date:</label>
                <input type="date" id="uploaded_at" name="uploaded_at">
            </div>
            <div class="form-actions">
                <a href="{{url('/document_submitted')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection