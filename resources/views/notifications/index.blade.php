@extends('base.BaseFormat')

@section('content')
    <div class="container">
        <h2><i class="fas fa-bell"></i> مرکز اعلان‌ها</h2>

        @if($notifications->count())
            <div class="notifications-list">
                @foreach($notifications as $notification)
                    <a href="{{ route('task.view', $notification->data['task_id'] ?? '#') }}"
                       class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}">

                        <div class="notification-icon">
                            <i class="fas fa-tasks"></i>
                        </div>

                        <div class="notification-content">
                            <div class="notification-title">
                                {{ $notification->data['title'] }}
                            </div>
                            <div class="notification-message">
                                {{ $notification->data['message'] }}
                            </div>
                            <div class="notification-time">
                                <i class="far fa-clock"></i>
                                {{ jDate($notification->created_at)->ago() }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        @else
            <div class="no-notifications">
                <i class="far fa-bell-slash fa-3x mb-3 d-block text-muted"></i>
                هیچ اعلانی برای نمایش وجود ندارد
            </div>
        @endif
    </div>

@endsection

@section('styles')
<style>
    .list-group-item.unread {
        background: #eef3ff;
        font-weight: 600;
    }

    .list-group-item.read {
        opacity: 0.7;
    }
</style>
@endsection
