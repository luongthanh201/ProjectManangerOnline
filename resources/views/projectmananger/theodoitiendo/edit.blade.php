@extends('projectmananger.layout.master')
@section('content')
<div id="progressModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Update Project Progress</h2>
            <a href="{{url('/track_progress_pm')}}">
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
        <form id="progressForm" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="projectId" name="id" value="{{$progress->id}}">
            <div class="form-group">
                <label for="progressValue">Progress (%)</label>
                <input type="number" id="progressValue" min="0" max="100" name="progress" value="{{$progress->progress}}">
            </div>
            <div class="form-group">
                <label for="projectStatus">Status</label>
                <select id="projectStatus" name="status" value="{{$progress->status}}">
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn">Cancel</button>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection