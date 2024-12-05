@extends('admin.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Update Project</h2>
            <a href="{{url('/project_mananger')}}">
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
            <label for="project-name">Project Name:</label>
            <input type="text" id="project-name" name="name" value="{{ $projects->name}}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="project-description">Description:</label>
            <textarea id="project-description" name="description">{{ $projects->description }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start_date" value="{{ old('start_date', $projects->start_date) }}">
            @error('start_date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end_date" value="{{ old('end_date', $projects->end_date) }}">
            @error('end_date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="project-status">Status:</label>
            <select id="project-status" name="status" value="{{$projects->status}}">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-actions">
                <a href="{{url('/project_mananger')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection