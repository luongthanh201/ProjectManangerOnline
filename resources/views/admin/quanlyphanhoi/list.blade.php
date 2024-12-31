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
                <h3 class="feedback-title">{{$fb->project->name ?? 'Unknown Project' }}</h3>
            </div>
            <div class="feedback-meta">
                @if ($fb->priority == 'High')
                    <span class="feedback-badge badge-high">High</span>
                @elseif ($fb->priority == 'Medium')
                    <span class="feedback-badge badge-medium">Medium</span>
                @else
                    <span class="feedback-badge badge-low">Low</span>
                @endif
            </div>
            <p class="feedback-content short-content">
                {{ Str::limit($fb->content, 100, '...') }} {{-- Hiển thị 100 ký tự đầu --}}
            </p>
            <p class="feedback-content full-content" style="display: none;">
                {{$fb->content}} {{-- Nội dung đầy đủ --}}
            </p>
            <div class="feedback-footer">
                <span>{{ $fb->user->name ?? 'Unknown User' }}</span>
                <span>{{ \Carbon\Carbon::parse($fb->created_at)->format('d/m/Y') }}</span>
                <a href="{{url('/detail_feedback/'.$fb->id)}}"">
                    <button class="toggle-detail-btn">
                        <i data-lucide="eye"></i>
                    </button>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection