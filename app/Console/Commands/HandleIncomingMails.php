<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HandleIncomingMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails-save_incoming_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save the incoming email info to database.';

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
        // get mail via stdin
        $email = file_get_contents("php://stdin");

        // handle the incoming email data
        $lines = explode("\n", $email);

        // set empty vars and explode message to variables
        $from = "";
        $subject = "";
        $to = "";
        $headers = "";
        $message = "";
        $splittingHeaders = true;
        for ($i=0; $i < count($lines); $i++) {
            if ($splittingHeaders) {
                // this is a header
                $headers .= $lines[$i]."\n";

                // look out for special headers
                if (preg_match("/^Subject: (.*)/", $lines[$i], $matches)) {
                    $subject = $matches[1];
                }
                if (preg_match("/^From: (.*)/", $lines[$i], $matches)) {
                    $from = $matches[1];
                }
                if (preg_match("/^To: (.*)/", $lines[$i], $matches)) {
                    $to = $matches[1];
                }
            } else {
                // not a header, but message
                $message .= $lines[$i]."\n";
            }

            if (trim($lines[$i])=="") {
                // empty line, header section has ended
                $splittingHeaders = false;
            }
        }


    }
}
