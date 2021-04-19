<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\IncomingMail;
use App\MailResponse;
use App\Mail\ResponseMail;

class MailController extends Controller
{
    /**
     * Returns mail's data of requested mail
     *
     * @return json data
     */
    public function loadMail(Request $request)
    {

        $mailId = $request->id;
        //fetch the mail
        $mail = IncomingMail::find($mailId);

        //fetch mail responses
        $responses = MailResponse::where('incoming_mail_id', $mail->id)->get();

        $data['mail'] = $mail;
        $data['responses'] = $responses;

        return json_encode($data);
    }


    /**
     * Sends response to mail
     *
     * @return view
     */
    public function mailResponse(Request $request)
    {
        $mailId = $request->mailid;
        $messagetext = $request->messagetext;
        $mail = IncomingMail::find($mailId);

        if (!$mail) {
            return redirect()->route('home')->withError('Invalid Request!');
        }

        if (!$messagetext || $messagetext=='') {
            return redirect()->route('home')->withError('Message can not be empty!');
        }

        //insert record
        MailResponse::create([
            'incoming_mail_id'  => $mailId,
            'email'             => $mail->from_mail,
            'message'           => $messagetext,
            'active'            => 1,
        ]);

        //send the mail
        Mail::to($mail->from_mail)->send(new ResponseMail($mail, $messagetext));

        return redirect()->route('home')->withSuccess('Successfully sent response!');
    }
}
