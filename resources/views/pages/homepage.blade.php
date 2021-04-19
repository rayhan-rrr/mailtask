@extends('layouts.home')


@section('title')
System Homepage
@endsection



@section('content')

<div class="email-wrapper wrapper">
  <div class="row bg-info">
    <div class="col-md-12">
      @if (session('success'))
        <div class="alert alert-success alert-dismissable fade show" style="margin: 15px;">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong> {{ session('success') }} </strong>
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger alert-dismissable fade show" style="margin: 15px;">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong> {{ session('error') }} </strong>
        </div>
      @endif

      <h1 class="text-center">Welcome!</h1>
      <p>
        This is a test mail handler system where you can read incoming emails and respond to them.
        <br>
        <b>The system is bases on email piping to php script.</b>
        <br>
        It could also be done with POP or IMAP by directly reading mailbox but according to the requirement it is done with email piping to php.
        <br>
        Currently three this system handles emails of 3 mailboxs.
        <br>
        You can send email to any of the following email address and as soon as it is received by the system, it will be available here.
        <br>
        Email address:
        <ul>
          <li><b>info@rrrlab.com</b></li>
          <li><b>info@retadesk.com</b></li>
          <li><b>test@rrrlab.com</b></li>
        </ul>
        
        You can response to any selected mails as many times as you want. Responses will be listed under incoming mail body.
        <br>
        <b>Note:</b> Outgoing mails will be delivered from <b>info@retadesk.com</b>
        <br>
        System currently does not support mail Attachments. It will be implemented in the next update.
        <br>
        Thank You.
      </p>
    </div>
  </div>

  <div class="row align-items-stretch">
    
    <div class="mail-list-container col-md-4 pt-4 pb-4 border-right bg-white">
      <div class="border-bottom pb-4 mb-3 px-3">
        <div class="form-group">
          <h2 class="text-center">Mail Inbox</h2>
        </div>
      </div>
      @foreach($mails as $key => $mail)

        <div class="mail-list mailItem {{ ($key==0)? 'active_mail' : '' }}" id="{{ $mail->id }}">
          <div class="content">
            <p class="sender-name">{{ $mail->from_name }}</p>
            <p class="message_text">{{ $mail->subject }}</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
      @endforeach
      
    </div>
    <div class="mail-view d-none d-md-block col-md-8 bg-white">
      <div class="message-body" style="display: none;">
        <div class="sender-details">
          <div class="col-md-8">
            <div class="details">
              <p class="msg-subject"></p>
              <p>
                From: <span class="sender-name"></span> (<a href="#" class="sender-mail"></a>)
              </p>
              <p>
                Time: <span class="pull-right mail_time"></span>
              </p>
              
              
            </div>
          </div>
          <div class="col-md-8">
            <div class="details">
              <p>
                To Name: <span class="to-name"></span>
              </p>
              <p>To mail: <span class="to-mail"></a></p>
              
              
            </div>
          </div>
          
        </div>
        <div class="message-content">

        </div>
        <h4>Your Responses:</h4>
        <div class="response-content">

        </div>

        <div class="container bootdey">
          <div class="email-app">

              <main>
                  <p class="text-center">Response to Email</p>
                  <form action="{{ route('mail-response') }}" method="post">
                    @csrf
                    <div class="row justify-content-md-center">
                  
                    <div class="col-md-12 col-lg-12">
                      <label>Write Reply</label>
                      <div class="form-group">
                         <textarea id="editor" name="messagetext"></textarea>
                      </div>
                      <input type="hidden" name="mailid" value="" id="mailId">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                  </div>
                  </form>
                  
              </main>
          </div>
        </div>

      </div>

      <div id="overlay" style="display: none; z-index: 10000;">

          <div class="loader"></div>
      </div>
    </div>
  </div>
</div>

@endsection    

@section('scripts')

<script>

  tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: false
  });

  //returns the body of the email, exclude the rest of html.
  function getMailBody(content) 
  { 
     var x = content.indexOf("<body");
     x = content.indexOf(">", x);    
     var y = content.lastIndexOf("</body>"); 
     return content.slice(x + 1, y);
  }

  //expand a mail
  $(".mailItem").click(function() {
    var mailid = $(this).attr('id');
    $(".mail-list").removeClass('active_mail');
    $(this).addClass('active_mail');
    loadMail(mailid);
  })

  //load the email data to container elements
  function loadMail(mailid) {
    $("#overlay").show();

    //load mail
    jQuery.ajax({

      url : '{{ route("load-mail") }}',
      type : 'post',
      data : {
        id :  mailid
      },
      success : function(data) {
        $(".message-body").show();
        $("#overlay").hide();
        $("#mailId").val(mailid);

        var returnedData = JSON.parse(data);
        var mailData = returnedData.mail;
        var responses = returnedData.responses;

        $(".message-content").html(getMailBody(mailData.body));    
        $(".msg-subject").html(mailData.subject);
        $(".sender-name").html(mailData.from_name);
        $(".sender-mail").html(mailData.from_mail);
        $(".mail_time").html(mailData.created_at);
        $(".to-name").html(mailData.to_name);
        $(".to-mail").html(mailData.to_mail);
        
        if (responses!='') {
          var responseContent = "<ol>";
          var itemcontent = "";
          for (var i = responses.length - 1; i >= 0; i--) {
            itemcontent = "<li>";
            itemcontent += responses[i].message;
            itemcontent += "<br>"+"Time: "+ responses[i].created_at;
            itemcontent += "</li>";

            responseContent += itemcontent;
          }
          responseContent += "</ol>";

          //print response content
          $(".response-content").html(responseContent);
        } else {
          $(".response-content").html("No response found!");
        }
        


      }
        
    });
  }

  //initially load the first email's data when page loaded
  loadMail('{{$mails[0]->id}}');

</script>
@endsection 


