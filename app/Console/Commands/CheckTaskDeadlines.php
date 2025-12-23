<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckTaskDeadlines extends Command
{
    protected $signature = 'tasks:check-deadlines';
    protected $description = 'بررسی تسک‌ها و ارسال نوتیف نزدیک شدن یا رد شدن ددلاین';

    public function handle()
    {
        $now = Carbon::now();
        Log::info("CheckTaskDeadlines run at: $now");

        $soonTasks = Task::where('deadline', '>', $now)
                         ->where('deadline', '<=', $now->copy()->addDay())
                         ->get();

        foreach ($soonTasks as $task) {
            $task->user->notify(new TaskNotification('task_deadline_soon', $task));
        }

        $passedTasks = Task::where('deadline', '<', $now)->get();

        foreach ($passedTasks as $task) {
            $task->user->notify(new TaskNotification('task_deadline_passed', $task));
        }

        $this->info('Deadline notifications checked successfully.');
    }
}
