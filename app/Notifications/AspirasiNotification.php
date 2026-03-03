<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AspirasiNotification extends Notification implements ShouldQueue
{
     use Queueable;

    protected $aspirasi;

    public function __construct($aspirasi)
    {
        $this->aspirasi = $aspirasi;
        \Log::info($aspirasi);
    }

    public function via($notifiable)
    {
        return ['database']; // hanya simpan ke database
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Aspirasi Baru!',
            'message' => 'Ada aspirasi baru dari siswa.',
            'aspirasi_id' => $this->aspirasi->id,
            // 'url' =>
        ];
    }
}
