<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Log;
use PhpMimeMailParser\Parser;

use App\IncomingMail;


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
        error_reporting(1);
        Log::info("Got request at: ". date("H:i:s"));
        
        // get mail via stdin
        $parser = new Parser();
        $parser->setStream(fopen("php://stdin", "r"));

        $arrayHeaderTo = $parser->getAddresses('to');
        // return [["display"=>"test", "address"=>"test@example.com", false]]

        $arrayHeaderFrom = $parser->getAddresses('from');
        // return [["display"=>"test", "address"=>"test@example.com", "is_group"=>false]]

        $subject = $parser->getHeader('subject');

        $text = $parser->getMessageBody('html');
        
        
        //insert data to mysql database

        IncomingMail::create([

            'from_mail' => $arrayHeaderFrom[0]['address'],
            'from_name' => $arrayHeaderFrom[0]['display'],
            'to_mail'   => $arrayHeaderTo[0]['address'],
            'to_name'   => $arrayHeaderTo[0]['display'],
            'subject'   => $subject,
            'body'      => $text,
            'active'    => 1,
        ]);

        //insertion complete

        
    }
}
