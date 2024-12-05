@extends('admin.layout.master')
@section('content')
<div class="header">
    <h1>User Management</h1>
</div>

<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search users...">
</div>

<div class="table-container">
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><span class="badge badge-{{$user->role}}">{{$user->role}}</span></td>
                    <td><span class="badge badge-{{$user->status}}">{{$user->status}}</span></td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/edit_user/'.$user->id)}}">
                                <button class="edit-btn">
                                    <i data-lucide="pencil"></i>
                                </button>
                            </a>
                            <a href="{{url('/delete_user/'.$user->id)}}">
                            <button class="delete-btn">
                                <i data-lucide="trash-2"></i>
                            </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection