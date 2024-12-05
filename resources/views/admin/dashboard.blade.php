@extends('admin.layout.master')
@section('content')
<div class="header">
    <div>
        <h1>Project Dashboard</h1>
        <p>Welcome back, Alex! Here's what's happening today.</p>
    </div>
    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
        alt="Profile" class="profile-img">
</div>

<div class="stats-grid" id="statsCards">
    <div class="stats-card-header" id="statsCards">
        <div>
            <p class="stats-title">Total Projects</p>
            <h4 class="stats-value">12</h4>
            <div class="stats-trend">
                <span class="">
                    8%
                </span>
                <span style="color: #6b7280; margin-left: 4px;">vs last month</span>
            </div>
        </div>
        <div class="stats-icon">
            <i data-lucide="briefcase"></i>
        </div>
    </div>
    <div class="stats-card-header" id="statsCards">
        <div>
            <p class="stats-title">In Progress</p>
            <h4 class="stats-value">7</h4>
            <div class="stats-trend">
                <span class="">
                    2%
                </span>
                <span style="color: #6b7280; margin-left: 4px;">vs last month</span>
            </div>
        </div>
        <div class="stats-icon">
            <i data-lucide="clock"></i>
        </div>
    </div>
    <div class="stats-card-header" id="statsCards">
        <div>
            <p class="stats-title">Team Members</p>
            <h4 class="stats-value">24</h4>
            <div class="stats-trend">
                <span class="">
                    5%
                </span>
                <span style="color: #6b7280; margin-left: 4px;">vs last month</span>
            </div>
        </div>
        <div class="stats-icon">
            <i data-lucide="users"></i>
        </div>
    </div>
    <div class="stats-card-header" id="statsCards">
        <div>
            <p class="stats-title">Completed Goals</p>
            <h4 class="stats-value">12</h4>
            <div class="stats-trend">
                <span class="">
                    83%
                </span>
                <span style="color: #6b7280; margin-left: 4px;">vs last month</span>
            </div>
        </div>
        <div class="stats-icon">
            <i data-lucide="target"></i>
        </div>
    </div>
</div>

<div class="projects-section">
    <h2>Active Projects</h2>
    <div class="projects-grid" id="projectCards">
        <div class="project-card">
            <div class="project-header">
                <h3 class="project-title">Website Redesign</h3>
                <span class="project-priority priority-high">High</span>
            </div>

            <p class="project-description">Modernize the company website with new design system and improved user
                experience
            </p>

            <div class="progress-section">
                <div class="progress-header">
                    <span>Progress</span>
                    <span>75%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:75%"></div>
                </div>
            </div>

            <div class="project-footer">
                <div class="project-meta">
                    <i data-lucide="clock"></i>
                    <span>Mar 30</span>
                </div>
                <div class="project-meta">
                    <i data-lucide="users"></i>
                    <span>6 members</span>
                </div>
            </div>
        </div>
        <div class="project-card">
            <div class="project-header">
                <h3 class="project-title">Mobile App Development</h3>
                <span class="project-priority priority-medium">Medium</span>
            </div>

            <p class="project-description">Create a new mobile app for customer engagement and loyalty program</p>

            <div class="progress-section">
                <div class="progress-header">
                    <span>Progress</span>
                    <span>45%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:45%"></div>
                </div>
            </div>

            <div class="project-footer">
                <div class="project-meta">
                    <i data-lucide="clock"></i>
                    <span>Apr 15</span>
                </div>
                <div class="project-meta">
                    <i data-lucide="users"></i>
                    <span>4 members</span>
                </div>
            </div>
        </div>
        <div class="project-card">
            <div class="project-header">
                <h3 class="project-title">Data Analytics Platform</h3>
                <span class="project-priority priority-high">High</span>
            </div>

            <p class="project-description">Build a comprehensive analytics dashboard for business intelligence</p>

            <div class="progress-section">
                <div class="progress-header">
                    <span>Progress</span>
                    <span>30%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:30%"></div>
                </div>
            </div>

            <div class="project-footer">
                <div class="project-meta">
                    <i data-lucide="clock"></i>
                    <span>May 1</span>
                </div>
                <div class="project-meta">
                    <i data-lucide="users"></i>
                    <span>5 members</span>
                </div>
            </div>
        </div>
        <div class="project-card">
            <div class="project-header">
                <h3 class="project-title">Marketing Campaign</h3>
                <span class="project-priority priority-low ">Low</span>
            </div>

            <p class="project-description">Plan and execute Q2 digital marketing campaign across multiple channels</p>

            <div class="progress-section">
                <div class="progress-header">
                    <span>Progress</span>
                    <span>60%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:60%"></div>
                </div>
            </div>

            <div class="project-footer">
                <div class="project-meta">
                    <i data-lucide="clock"></i>
                    <span>Apr 10</span>
                </div>
                <div class="project-meta">
                    <i data-lucide="users"></i>
                    <span>3 members</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection