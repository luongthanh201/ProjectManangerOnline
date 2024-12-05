@extends('projectmananger.layout.master')
@section('content')
<div class="header">
    <h1>Report</h1>
    <a href="{{url('/add_report')}}">
        <button class="add-btn">
            <i data-lucide="folder-plus"></i>
            Add New Report
        </button>
    </a>
</div>
<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search report...">
</div>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Creator</th>
                <th>Created date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($reports->isEmpty())
                <tr>
                    <td colspan="7">No report found.</td>
                </tr>
            @endif
            @foreach ($reports as $report)
                <tr>
                    <td>{{$report->id}}</td>
                    <td>{{$report->name}}</td>
                    <td>{{$report->user->name ?? 'Unknown User'}}</td>
                    <td>{{ \Carbon\Carbon::parse($report->created_date)->format('d/m/Y') }}</td>

                    <td>
                        @if($report->status == 'pending')
                            <span class="badge badge-pending">Pending</span>
                        @elseif($report->status == 'approved')
                            <span class="badge badge-approved">Approved</span>
                        @else
                            <span class="badge badge-rejected">Rejected</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{url('/download_report/' . $report->id)}}" title="Tải xuống báo cáo">
                                <button class="download-btn">
                                    <i data-lucide="download"></i> <!-- Icon tải xuống -->
                                </button>
                            </a>
                            <a href="{{url('/delete_report/' . $report->id)}}">
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