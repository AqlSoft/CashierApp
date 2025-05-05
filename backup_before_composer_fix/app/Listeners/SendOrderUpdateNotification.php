<?php

namespace App\Listeners;

use App\Events\OrderUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Response;

class SendOrderUpdateNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderUpdated  $event
     * @return void
     */
    public function handle(OrderUpdated $event)
    {
        // لا تحتاج إلى معالجة إضافية هنا إذا كنت تستخدم البث (Broadcasting)
        // سيتم التعامل مع إرسال SSE بواسطة نظام البث.
    }
}