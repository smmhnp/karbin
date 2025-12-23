<header class="main-header">
    <button class="mobile-menu-toggle" id="toggleMobileMenu">
        <i class="fas fa-bars"></i>
    </button>
    <div class="logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Kar Bin Logo">
        </a>
    </div>
    
    <nav class="main-nav">
        @if (Auth::check())
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-list-ul fa-fw"></i> داشبورد</a>
            <a href="{{ route('board') }}" class="nav-link"><i class="fas fa-folder fa-fw"></i> تابلوی جریان کار</a>
            @if (isset(Auth::user()->role) and Auth::user()->role == 'super_admin')
                <a href="{{ route('project') }}" class="nav-link"><i class="fas fa-folder fa-fw"></i> پروژه‌ها</a>
            @endif
            <a href="{{ route('profile') }}" class="nav-link"><i class="fas fa-user-cog fa-fw"></i> پروفایل</a>

            @if (isset(Auth::user()->role) and Auth::user()->role == 'super_admin')
                <a href="{{ route('users.all') }}" class="nav-link"><i class="fas fa-users-cog fa-fw"></i> مدیریت کاربران</a>
            @endif

        @endif
    </nav>
    
    <div class="header-actions">
        @php
            $user = Auth::user();
        @endphp

        <div class="notif-wrapper">
            <button id="notifBtn" class="btn btn-light notif-btn">
                <i class="fas fa-bell"></i>

                @if($user->unreadNotifications->count())
                    <span class="notif-badge">
                        {{ $user->unreadNotifications->count() }}
                    </span>
                @endif
            </button>
            <div id="notifDropdown" class="notif-dropdown">
                <div class="notif-header">
                    <span>نوتیفیکیشن‌ها</span>
                    <small>{{ $user->unreadNotifications->count() }} خوانده نشده</small>
                </div>

                <div class="notif-body">
                    @forelse($user->notifications->take(4) as $notification)
                        <div class="notif-item {{ $notification->read_at ? '' : 'unread' }}">
                            <div class="notif-icon">
                                <i class="fas fa-tasks"></i>
                            </div>  
                            <div class="notif-content">
                                <strong>{{ $notification->data['title'] }}</strong>
                                <p>{{ $notification->data['message'] }}</p>
                                <span>{{ jDate($notification->created_at->diffForHumans())->ago() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="notif-empty">
                            نوتیفیکیشنی وجود ندارد
                        </div>
                    @endforelse
                </div>

                <div class="notif-footer">
                    <a href="{{ route('notifications.index') }}">مشاهده همه</a>
                </div>
            </div>
        </div>


        <a href="{{ route('add') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> وظیفه جدید</a>

        @if (Auth::check())
            <a href="{{ route('profile') }}">
                <div class="user-menu">
                    <div class="user-avatar">{{ isset(Auth::user()->firstname) ? Str::substr(Auth::user()->firstname, 0, 3) : '' }}</div>
                    <div class="user-info">
                        <span class="user-nickname">{{ isset(Auth::user()->firstname) ? Auth::user()->firstname : 'Lead' }}</span>
                        <span class="user-role">{{ isset(Auth::user()->role) ? Role (Auth::user()->role) : '' }}</span>
                    </div>
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link"><i class="fas fa-sign-out-alt"></i></button>
            </form>
        @else
            <a href="{{ route('login') }}" class="icon-link" title="login"><i class="fas fa-sign-in-alt"></i></a>
        @endif

    </div>
</header>

<div class="mobile-menu-drawer">
    <a href="{{ route('dashboard') }}" class="mobile-nav-link"><i class="fas fa-list-ul fa-fw"></i> داشبورد</a>
    <a href="{{ route('board') }}" class="mobile-nav-link"><i class="fas fa-folder fa-fw"></i> تابلوی جریان کار</a>
    <a href="{{ route('project') }}" class="nav-link"><i class="fas fa-folder fa-fw"></i> پروژه‌ها</a>
    <a href="{{ route('add') }}" class="mobile-nav-link"><i class="fas fa-plus-circle fa-fw"></i> وظیفه جدید</a>
    <a href="{{ route('profile') }}" class="mobile-nav-link"><i class="fas fa-user-cog fa-fw"></i> پروفایل</a>

    @if (isset(Auth::user()->role) and Auth::user()->role == 'super_admin')
        <a href="{{ route('users.all') }}" class="nav-link"><i class="fas fa-users-cog fa-fw"></i> مدیریت کاربران</a>
    @endif

    @if (Auth::check())
        <a href="{{ route('logout') }}" class="icon-link" title="logout"><i class="fas fa-sign-out-alt"></i> خروج</a>
    @else
        <a href="{{ route('login') }}" class="icon-link" title="login"><i class="fas fa-sign-out-alt"></i> ورود</a>
    @endif

</div>