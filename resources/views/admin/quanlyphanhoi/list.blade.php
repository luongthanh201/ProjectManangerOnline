@extends('admin.layout.master')
@section('content')
<div class="header">
    <h1>Customer Feedback</h1>
    <div class="header-actions">
        <button class="filter-btn">
            <i data-lucide="filter"></i>
            Filters
        </button>
        <button class="export-btn">
            <i data-lucide="download"></i>
            Export
        </button>
    </div>
</div>

<div class="filter-panel" id="filterPanel">
    <div class="filter-group">
        <label>Status</label>
        <select id="statusFilter">
            <option value="">All</option>
            <option value="new">New</option>
            <option value="in-progress">In Progress</option>
            <option value="resolved">Resolved</option>
        </select>
    </div>
    <div class="filter-group">
        <label>Priority</label>
        <select id="priorityFilter">
            <option value="">All</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
    </div>
    <div class="filter-group">
        <label>Date Range</label>
        <div class="date-inputs">
            <input type="date" id="startDate">
            <input type="date" id="endDate">
        </div>
    </div>
</div>

<div class="search-bar">
    <i data-lucide="search"></i>
    <input type="text" id="searchInput" placeholder="Search feedback...">
</div>

<div class="feedback-grid" id="feedbackGrid">
    @foreach ($feedbacks as $fb)
        <div class="feedback-card" id="{{$fb->id}}">
            <div class="feedback-header">
                <h3 class="feedback-title">{{$fb->projects()->name}}</h3>
            </div>
            <div class="feedback-meta">
                @if ($fb->status == 'in-progress')
                    <span class="feedback-badge badge-in-progress">in-progress</span>
                @elseif ($fb->status == 'resolved')
                    <span class="feedback-badge badge-resolved">resolved</span>
                @else
                    <span class="feedback-badge badge-pending">pending</span>
                @endif

                @if ($fb->priority == 'High')
                    <span class="feedback-badge badge-High">High</span>
                @elseif ($fb->priority == 'Medium')
                    <span class="feedback-badge badge-Medium">Medium</span>
                @else
                    <span class="feedback-badge badge-Low">Low</span>
                @endif

            </div>
            <p class="feedback-content">{{$fb->content}}</p>
            <div class="feedback-footer">
                <span>{{$fb->users()->name}}</span>
                <span> <span>{{ \Carbon\Carbon::parse($fb->start_date)->format('d/m/Y') }}
                        - {{ \Carbon\Carbon::parse($fb->end_date)->format('d/m/Y') }}</span>
                <a href="{{url('/feedback_detail/' .$fb->id)}}"></a>
            </div>
        </div>
    @endforeach
</div>
@endsection