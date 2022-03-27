<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookRentalMail;
use App\Borrow;

class BookRentalExpireEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookrentalexpire:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email for all rental expire book user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $details = Borrow::with('user','book')->where('end_date', '<', Carbon::now())
        ->where('mail_status', '=', 'pending')->get();
        if (count($details) > 0) {
            foreach($details as $detail) {
                $this->email($detail);
                $detail->mail_status = 'completed';
                $detail->save();
            }
        }
    }

    protected function email($detail)
    {
        $useremail = $detail->user->email;
        Mail::to($useremail)->send(new BookRentalMail($detail));
    }
}
