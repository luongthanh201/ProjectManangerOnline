@extends('client.layout.master')
@section('content')
<div class="header">
    <h1>List of Products Waiting for Approval</h1>
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
                <th>Product Name</th>
                <th>Start Date</th>
                <th>End Date</th>
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
                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/approve_project/' . $project->id)}}"
                                onclick="event.preventDefault(); document.getElementById('approve-form').submit();">
                                <button class="approve-btn">
                                    <i data-lucide="check"></i>
                                </button>
                            </a>
                            <form id="approve-form" action="{{url('/approve_project/' . $project->id)}}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection