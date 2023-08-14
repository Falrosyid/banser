<?php

namespace App\Mail;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BanserEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = DB::table('users')
            ->where('role', 'admin')
            ->get();
            foreach ($user as $key) {
            }
        return $this->from('banser.bwi@gmail.com')
                   ->view('/auth/email')
                   ->with(
                    [
                        'nama' => $key->name,
                    ]);
    }
}
