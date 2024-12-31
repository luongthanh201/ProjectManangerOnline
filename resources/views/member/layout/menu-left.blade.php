<aside class="sidebar">
    <div class="sidebar-header">
        <i data-lucide="layout"></i>
        <h1>ProjectHub</h1>
    </div>
    <nav class="sidebar-nav">
        <!-- Track Progress -->
        <a href="{{url('/track_progress_member')}}" class="nav-item active">
            <i data-lucide="bar-chart-2"></i>
            <span>Theo dõi tiến độ dự án</span>
        </a>
        <!-- Personal Work -->
        <a href="{{url('/work_manager')}}" class="nav-item">
            <i data-lucide="briefcase"></i>
            <span>Công việc cá nhân</span>
        </a>
        <!-- Submit Documents -->
        <a href="{{url('/document_submitted')}}" class="nav-item">
            <i data-lucide="upload"></i>
            <span>Gửi tài liệu</span>
        </a>
        <!-- Real-time Chat -->
        <a href="{{url('/message')}}" class="nav-item">
            <i data-lucide="message-circle"></i>
            <span>Chat</span>
        </a>
        <!-- Personal Information -->
        <a href="{{url('/update_infor')}}" class="nav-item">
            <i data-lucide="user"></i>
            <span>Thông tin cá nhân</span>
        </a>
        <!-- Receive Notifications -->
        <a href="{{url('/received_notify')}}" class="nav-item">
            <i data-lucide="bell"></i>
            <span>Thông báo</span>
        </a>
        <!-- Settings -->
        <a href="Settings.html" class="nav-item">
            <i data-lucide="settings"></i>
            <span>Settings</span>
        </a>
    </nav>
    <a href="{{ url('/logout_acc')}}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <button class="logout-btn">
            <i data-lucide="log-out"></i>
            <span>Logout</span>
        </button>
    </a>
    <form id="logout-form" action="{{ url('/logout_acc')}}" method="POST" style="display: none;">
        @csrf
    </form>
</aside>