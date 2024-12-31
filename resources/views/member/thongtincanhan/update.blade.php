@extends('member.layout.master')
@section('content')
<div class="header" style="text-align: center;">
    <h1>Information</h1>
</div>

<!-- Personal Info Form -->
<div class="personal-info">
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
        <div class="form-actions">
            <button type="submit" class="save-btn">Save</button>
        </div>
    </form>
</div>
@endsection