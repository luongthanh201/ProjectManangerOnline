@extends('projectmananger.layout.master')
@section('content')
<div class="header">
    <h1>Project</h1>
    <a href="{{url('/add_project')}}">
        <button class="add-btn">
            <i data-lucide="folder-plus"></i>
            Add New Project
        </button>
    </a>
</div>
<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search projects...">
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($projects->isEmpty())
                <tr>
                    <td colspan="7">No projects found.</td>
                </tr>
            @endif
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>
                    <td>{{ Str::limit($project->description, 100, '...') }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</td>
                    <td>
                        @if($project->status == 'active')
                            <span class="badge badge-active">Active</span>
                        @elseif($project->status == 'completed')
                            <span class="badge badge-completed">Completed</span>
                        @else
                            <span class="badge badge-inactive">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/edit_project/' . $project->id)}}">
                                <button class="edit-btn">
                                    <i data-lucide="pencil"></i>
                                </button>
                            </a>
                            <a href="{{url('/delete_project/' . $project->id)}}">
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