@extends('member.layout.master')
@section('content')
<div class="header">
    <h1>Track Progress</h1>
</div>

<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search project...">
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Progress</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if($progress->isEmpty())
                <tr>
                    <td colspan="7">No projects found.</td>
                </tr>
            @endif
            @foreach ($progress as $track)
                <tr>
                    <td>{{$track->id}}</td>
                    <td>{{$track->name}}</td>
                    <td>{{ \Carbon\Carbon::parse($track->start_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($track->end_date)->format('d/m/Y') }}</td>
                    <td>{{$track->progress}}%</td>
                    <td>
                        @if($track->status == 'active')
                            <span class="badge badge-active">Active</span>
                        @elseif($track->status == 'completed')
                            <span class="badge badge-completed">Completed</span>
                        @else
                            <span class="badge badge-inactive">Inactive</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection