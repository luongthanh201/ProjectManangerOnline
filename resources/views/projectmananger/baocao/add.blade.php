@extends('admin.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Add New Report</h2>
            <a href="{{url('/report_mananger')}}">
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
        <form id="project-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Report Name:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="file">Upload File:</label>
                <input type="file" name="file_path" id="file_path" >
            </div>
            <div class="form-group">
                <label for="assigned-to">Creator:</label>
                <input type="text" id="assigned-to" name="user_id">
            </div>
            <div class="form-group">
                <label for="deadline">Created date:</label>
                <input type="date" id="deadline" name="created_date">
            </div>
            <div class="form-group">
                <label for="task-status">Status:</label>
                <select id="task-status" name="status">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>In-progress</option>
                    <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{url('/report_mananger')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection