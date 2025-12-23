<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TaskNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $type,
        public $task
    ) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $taskTitle = $this->task->title->title ?? '---';

        return [
            'type' => $this->type,
            'task_id' => $this->task->id,
            'title' => match($this->type) {
                'task_created' => 'وظیفه جدید',
                'task_updated' => 'ویرایش وظیفه',
                'delete_task' => 'حذف وظیفه',
                'project_created' => "پروژه جدید",
                'project_updated' => 'ویرایش پروژه',
                'task_status_changed' => 'تغییر وضعیت',
                'task_deadline_soon' => 'نزدیک شدن به مهلت',
                'task_deadline_passed' => 'مهلت پایان یافت',
            },
            'message' => match($this->type) {
                'task_created' => "وظیفه «{$this->task->project_name}» به شما اختصاص داده شد",
                'task_updated' => "وظیفه «{$this->task->project_name}» ویرایش شد",
                'delete_task' => "تسک «{$this->task->project_name}» حذف شد.",
                'project_created' => "پروژه «{$taskTitle}» ایجاد شد",
                'project_updated' => "پروژه «{$taskTitle}» ویرایش شد",
                'task_status_changed' => "وضعیت وظیفه «{$this->task->project_name}» به «{$this->task->status}» تغییر کرد",
                'task_deadline_soon' => "کمتر از ۲۴ ساعت تا پایان وظیفه «{$this->task->project_name}» باقی مانده",
                'task_deadline_passed' => "مهلت انجام وظیفه «{$this->task->project_name}» به پایان رسیده",
            },
        ];
    }
}

