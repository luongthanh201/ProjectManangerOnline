<aside class="sidebar">
            <div class="sidebar-header">
                <i data-lucide="layout-dashboard"></i>
                <h1>ProjectHub</h1>
            </div>           
            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <i data-lucide="home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{url('/user_mananger')}}" class="nav-item">
                    <i data-lucide="users"></i>
                    <span>Tài khoản</span>
                </a>
                <a href="{{url('/cate_mananger')}}" class="nav-item">
                    <i data-lucide="list"></i>
                    <span> Danh mục dự án</span>
                </a>
                <a href="{{url('/feedback_mananger')}}" class="nav-item">
                    <i data-lucide="mail"></i>
                    <span>Thông tin phản hồi</span>
                </a>
                <a href="{{url('/notify_mananger')}}" class="nav-item">
                    <i data-lucide="info"></i>
                    <span>Thông báo hệ thống</span>
                </a>
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