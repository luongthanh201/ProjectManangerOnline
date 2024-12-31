@extends('projectmananger.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Update Task</h2>
            <a href="{{url('/assign_work')}}">
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
                <label for="task-name">Task Name:</label>
                <input type="text" id="task-name" name="name" value="{{$tasks->name}}">
            </div>

            <div class="form-group">
                <label for="assigned-to">Assign To:</label>
                <input type="text" id="assigned-to" name="id_user" value="{{$tasks->user->name ?? 'Unknown User' }}">
            </div>

            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $tasks->deadline) }}">
            </div>

            <div class="form-group">
                <label for="task-status">Status:</label>
                <select id="task-status" name="status" value="{{$tasks->status}}">
                    <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In-progress</option>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{url('/assign_work')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection