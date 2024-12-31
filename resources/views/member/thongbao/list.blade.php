@extends('member.layout.master')
@section('content')
<div class="header">
    <h1>Notifications</h1>
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
                <th>Date received</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifies as $notify)
                <tr>
                    <td>{{$notify->id}}</td>
                    <td>{{$notify->name}}</td>
                    <td>{{$notify->date_received}}</td>
                    <td>
                        @if($notify->status == 'not-received')
                            <span class="badge badge-inactive">Not Received</span>
                        @else
                            <span class="badge badge-active">Received</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/detail_notify/' . $notify->id)}}">
                                <button class="edit-btn">
                                    <i data-lucide="eye"></i>
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