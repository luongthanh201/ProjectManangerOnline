@extends('admin.layout.master')
@section('content')
<div id="userModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Update User</h2>
            <a href="{{url('/user_mananger')}}">
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
        <form id="userForm" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="userId" value="{{ $users->id }}">

            <div class="form-group">
                <label for="userName">Name</label>
                <input type="text" id="userName" name="name" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label for="userEmail">Email</label>
                <input type="email" id="userEmail" name="email" value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label for="userPass">Password</label>
                <input type="password" id="userPass" name="password">
            </div>
            <div class="form-group">
                <label for="userConfirmPass">Confirm password</label>
                <input type="password" id="userConfirmPass">
            </div>
            <div class="form-group">
                <label for="userRole">Role</label>
                <select id="userRole" name="role">
                    <option value="admin" {{ $users->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="project_manager" {{ $users->role === 'project_manager' ? 'selected' : '' }}>Project
                        Manager</option>
                    <option value="member" {{ $users->role === 'member' ? 'selected' : '' }}>Member</option>
                    <option value="client" {{ $users->role === 'client' ? 'selected' : '' }}>Client</option>
                </select>
            </div>
            <div class="form-group">
                <label for="userStatus">Status</label>
                <select id="userStatus" name="status">
                    <option value="active" {{ $users->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $users->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="form-actions">
                <a href="{{ url('/user_mananger') }}">
                    <button type="button" class="cancel-btn">Cancel</button>
                </a>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>

    </div>
    </main>
</div>
@endsection