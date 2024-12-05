@extends('projectmananger.layout.master')
@section('content')
<div class="header">
    <h1>Assign Work</h1>
    <a href="{{url('/add_assign')}}">
        <button class="add-btn">
            <i data-lucide="folder-plus"></i>
            Assign New Work
        </button>
    </a>
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
                <th>Assigned To</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks->isEmpty())
                <tr>
                    <td colspan="7">No task found.</td>
                </tr>
            @endif
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->user->name ?? 'Unknown User'}}</td>
                    <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</td>

                    <td>
                        @if($task->status == 'in-progress')
                            <span class="badge badge-in-progress">In Progress</span>
                        @elseif($task->status == 'pending')
                            <span class="badge badge-pending">Pending</span>
                        @else
                            <span class="badge badge-completed">Completed</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/edit_assign/' . $task->id)}}">
                                <button class="edit-btn">
                                    <i data-lucide="pencil"></i>
                                </button>
                            </a>
                            <a href="{{url('/delete_assign/' . $task->id)}}">
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