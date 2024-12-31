@extends('member.layout.master')
@section('content')
<div class="header">
    <h1>Work Management</h1>
</div>
<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search assignments...">
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Deadline</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks->isNotEmpty())
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</td>
                        <td>
                            @if($task->status == 'hight')
                                <span class="badge badge-hight">High</span>
                            @elseif($task->status == 'medium')
                                <span class="badge badge-medium">Medium</span>
                            @else
                                <span class="badge badge-low">Low</span>
                            @endif
                        </td>
                        <td>
                            @if($task->status == 'in-progress')
                                <span class="badge badge-in-progress">In Progress</span>
                            @elseif($task->status == 'pending')
                                <span class="badge badge-pending">Pending</span>
                            @else
                                <span class="badge badge-active">Completed</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{url('/edit_work/' . $task->id)}}">
                                    <button class="edit-btn">
                                        <i data-lucide="pencil"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No tasks found for the current user.</td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
@endsection