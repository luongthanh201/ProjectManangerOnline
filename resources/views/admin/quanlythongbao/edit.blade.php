@extends('admin.layout.master')
@section('content')
<div id="notificationModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Add New Notification</h2>
            <a href="{{url('/notify_mananger')}}">
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
        <form id="notificationForm" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="notificationId" value="{{$notify->id}}">
            <div class="form-group">
                <label for="notificationTitle">Name</label>
                <input type="text" id="notificationTitle" name="name" value="{{$notify->name}}">
            </div>
            <div class="form-group">
                <label for="notificationContent">Content</label>
                <textarea id="notificationContent" rows="5" name="content">{{$notify->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="nameUser">Creator</label>
                <input type="text" id="id_user" name="id_user" value="{{$notify->user->name ?? 'Unknown User' }}">
            </div>
            <div class="form-group">
                <label for="uploaded_at">Create date:</label>
                <input type="date" id="date_received" name="date_received">
            </div>
            <div class="form-group">
                <label for="notificationStatus">Status</label>
                <select id="notificationStatus" name="status" value="{{$notify->status}}">
                    <option value="received">Received</option>
                    <option value="not-received">Not Received</option>
                </select>
            </div>
            <div class="form-actions">
                <a href="{{url('/notify_mananger')}}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection