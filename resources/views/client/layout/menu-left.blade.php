<aside class="sidebar">
    <div class="sidebar-header">
        <i data-lucide="layout"></i>
        <h1>ProjectHub</h1>
    </div>
    <nav class="sidebar-nav">
        <!-- Track Progress -->
        <a href="{{url('/track_progress_client')}}" class="nav-item active">
            <i data-lucide="bar-chart-2"></i> <!-- Biểu tượng tiến độ -->
            <span>Theo dõi tiến độ dự án</span>
        </a>
        <!-- Send feedback-->
        <a href="{{url('/send_feedback')}}" class="nav-item">
            <i data-lucide="message-circle"></i> <!-- Biểu tượng phản hồi -->
            <span>Gửi phản hồi</span>
        </a>
        <!-- Submit Documents -->
        <a href="{{url('/aproval_project')}}" class="nav-item">
            <i data-lucide="check-circle"></i> <!-- Biểu tượng duyệt sản phẩm -->
            <span>Duyệt sản phẩm</span>
        </a>
        <!-- Settings -->
        <a href="Settings.html" class="nav-item">
            <i data-lucide="settings"></i> <!-- Biểu tượng cài đặt -->
            <span>Cài đặt</span>
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