<aside class="sidebar">
    <div class="sidebar-header">
        <i data-lucide="layout"></i>
        <h1>ProjectHub</h1>
    </div>
    <nav class="sidebar-nav">
        <!-- Track Progress -->
        <a href="{{url('/track_progress_pm')}}" class="nav-item active">
            <i data-lucide="activity"></i>
            <span>Theo dõi tiến độ dự án</span>
        </a>
        <!-- Project -->
        <a href="{{url('/project_mananger')}}" class="nav-item">
            <i data-lucide="folder"></i>
            <span>Quản lý dự án</span>
        </a>
        <!-- Assign Work -->
        <a href="{{url('/assign_work')}}" class="nav-item">
            <i data-lucide="user-check"></i>
            <span>Phân công công việc</span>
        </a>
        <!-- Project Documents -->
        <a href="{{url('/document_mananger')}}" class="nav-item">
            <i data-lucide="file-text"></i>
            <span>Tài liệu dự án</span>
        </a>
        <!-- Report -->
        <a href="{{url('/report_mananger')}}" class="nav-item">
            <i data-lucide="file-warning"></i>
            <span>Báo cáo</span>
        </a>
        <!-- Settings -->
        <a href="#" class="nav-item">
            <i data-lucide="settings"></i>
            <span>Settings</span>
        </a>
    </nav>

    <button class="logout-btn">
        <i data-lucide="log-out"></i>
        <span>Logout</span>
    </button>
</aside>