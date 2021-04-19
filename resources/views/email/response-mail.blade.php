@component('mail::message')

<p>
	This is a response email to the email that you sent to {{ $mailData->to_mail }} on {{ $mailData->created_at }} with subject: <b>{{ $mailData->subject }}</b>.
</p>
<br>
<br>

{!! $message !!}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
