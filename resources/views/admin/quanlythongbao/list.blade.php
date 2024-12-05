@extends('admin.layout.master')
@section('content')
<div class="header">
    <h1>Notifications</h1>
    <a href="{{url('/add_notify')}}">
        <button class="add-btn">
            <i data-lucide="folder-plus"></i>
            Add New Notifications
        </button>
    </a>
</div>

<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search notifications...">
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Creator</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifies as $notify )
            <tr>
                    <td>{{$notify->id}}</td>
                    <td>{{$notify->name}}</td>
                    <td>{{$notify->content}}</td>
                    <td>{{$notify->user->name ?? 'Unknown User' }}</td>
                    <td>
                        @if($notify->status == 'not-received')
                            <span class="badge badge-inactive">Not Received</span>
                        @else
                            <span class="badge badge-active">Received</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/edit_notify/' . $notify->id )}}">
                                <button class="edit-btn">
                                    <i data-lucide="pencil"></i>
                                </button>
                            </a>
                            <a href="{{url('/delete_cate/' . $notify->id)}}">
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