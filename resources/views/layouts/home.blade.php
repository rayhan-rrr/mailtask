<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
    margin-top:20px;
    background: #eee;
}
/* Rounded sliders */
/*-------------------------------------------------------------------*/
/* === Email === */
/* Mail Sidebar */
@media (max-width: 769px) {
  .email-wrapper .mail-sidebar {
    position: relative;
  }
}

@media (max-width: 767.98px) {
  .email-wrapper .mail-sidebar {
    position: fixed;
    z-index: 99;
    background: #ffffff;
    width: 45%;
    min-width: 300px;
    left: -100%;
    display: block;
    transition: 0.4s ease;
    -webkit-transition: 0.4s ease;
    -moz-transition: 0.4s ease;
  }
}

.email-wrapper .mail-sidebar .menu-bar {
  width: 100%;
  float: right;
  height: 100%;
  min-height: 100%;
}

@media (max-width: 767.98px) {
  .email-wrapper .mail-sidebar .menu-bar {
    min-height: 100vh;
    max-height: 100%;
    height: auto;
    overflow-y: auto;
    overflow-x: hidden;
  }
}

.email-wrapper .mail-sidebar .menu-bar .menu-items {
  padding: 0;
  margin-bottom: 0;
  height: auto;
  list-style-type: none;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li {
  padding: 10px 15px;
  transition: 0.4s;
  position: relative;
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: space-between;
  justify-content: space-between;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li:hover {
  background: rgba(240, 244, 249, 0.8);
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li a {
  color: #303a40;
  font-size: 0.75rem;
  text-decoration: none;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li a i {
  margin-right: 8px;
  font-size: 0.75rem;
  line-height: 1.5;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li.active {
  background: #e6e9ed;
  border-radius: 4px;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li.active a {
  color: #464dee;
}

.email-wrapper .mail-sidebar .menu-bar .menu-items li.compose:hover {
  background: transparent;
}

.email-wrapper .mail-sidebar .menu-bar .online-status {
  margin-top: 1rem;
}

.email-wrapper .mail-sidebar .menu-bar .online-status .chat {
  font-size: 0.75rem;
  color: #464dee;
  margin-bottom: 0;
  font-weight: 600;
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status {
  height: 10px;
  width: 10px;
  border-radius: 100%;
  display: inline-flex;
  justify-content: flex-start;
  transform: translateX(-43px) translateY(2px);
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status:after {
  font-size: 12px;
  color: #2e383e;
  margin: -5px 0 0 18px;
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status.offline {
  background: #ef5958;
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status.offline:after {
  content: "Offline";
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status.online {
  background: #0ddbb9;
}

.email-wrapper .mail-sidebar .menu-bar .online-status .status.online:after {
  content: "Online";
}

.email-wrapper .mail-sidebar .menu-bar .profile-list {
  padding: 10px 0;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item {
  border-bottom: 1px solid #e9e9e9;
  padding: 6px 0;
  display: block;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item:last-child {
  border-bottom: 0;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a {
  text-decoration: none;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a .pro-pic {
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  padding: 0;
  width: 20%;
  max-width: 40px;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a .pro-pic img {
  max-width: 100%;
  width: 100%;
  border-radius: 100%;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a .user {
  width: 100%;
  padding: 5px 10px 0 15px;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a .user .u-name {
  font-weight: 400;
  font-size: 0.75rem;
  line-height: 1;
  color: #000000;
}

.email-wrapper .mail-sidebar .menu-bar .profile-list-item a .user .u-designation {
  font-size: calc(0.75rem - 0.1rem);
  margin-bottom: 0;
}

.email-wrapper .sidebar.open {
  left: 0;
}

/* Mail List Container */
.email-wrapper .mail-list-container {
  border-left: 1px solid #e9e9e9;
  height: 100%;
  padding-left: 0;
  padding-right: 0;
}

.email-wrapper .mail-list-container a {
  text-decoration: none;
}

.email-wrapper .mail-list-container .mail-list {
  border-bottom: 1px solid #e9e9e9;
  display: flex;
  flex-direction: row;
  padding: 10px 15px;
  width: 100%;
}

.email-wrapper .mail-list-container .mail-list:last-child {
  border-bottom: none;
}


.email-wrapper .mail-list-container .mail-list .content {
  width: 83%;
  padding-left: 0;
  padding-right: 0;
}

.email-wrapper .mail-list-container .mail-list .content .sender-name {
  font-size: 0.75rem;
  font-weight: 400;
  max-width: 95%;
}

.email-wrapper .mail-list-container .mail-list .content .message_text {
  margin: 0;
  max-width: 93%;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.email-wrapper .mail-list-container .mail-list .details {
  width: 5.5%;
}

.email-wrapper .mail-list-container .mail-list .details .date {
  text-align: right;
  margin: auto 15px auto 0;
  white-space: nowrap;
}

.email-wrapper .mail-list-container .mail-list .details i {
  margin: auto 0;
  color: #ddd;
}

.email-wrapper .mail-list-container .mail-list .details i.favorite {
  color: #fcd539;
}

.email-wrapper .mail-list-container .mail-list.active_mail {
  background: #e6e9ed;
}



.email-wrapper .mail-list-container .mail-list.new_mail .details .date {
  color: #000000;
}

.mailItem:hover{
  cursor: pointer;
}
/* Message Content */
.email-wrapper .message-body .sender-details {
  padding: 20px 15px 0;
  border-bottom: 1px solid #e9e9e9;
  display: -webkit-flex;
  display: flex;
}

.email-wrapper .message-body .sender-details .details {
  padding-bottom: 0;
}

.email-wrapper .message-body .sender-details .details .msg-subject {
  font-weight: 600;
}

.email-wrapper .message-body .sender-details .details .sender-email {
  margin-bottom: 20px;
  font-weight: 400;
}

.email-wrapper .message-body .sender-details .details .sender-email i {
  font-size: 1rem;
  font-weight: 600;
  margin: 0 1px 0 7px;
}

.email-wrapper .message-body .message-content {
  padding: 50px 15px;
  overflow-x: scroll;

}

/*mail composer*/

.email-app {
    display: flex;
    flex-direction: row;
    background: #fff;
    border: 1px solid #e1e6ef;
}



.email-app main {
    min-width: 0;
    flex: 1;
    padding: 1rem;
}



.email-app .inbox .messages {
    padding: 0;
    list-style: none;
}



@media (max-width: 767px) {
    .email-app {
        flex-direction: column;
    }
    .email-app nav {
        flex: 0 0 100%;
    }
}

@media (max-width: 575px) {
    .email-app .message .header {
        flex-flow: row wrap;
    }
    .email-app .message .header .date {
        flex: 0 0 100%;
    }
}
    </style>

    <style>
.loader {
  position: relative;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 70px;
  height: 70px;
  left:50%;
  top:50%;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
#overlay{
    position: absolute;
    top:0px;
    left:0px;
    width: 100%;
    height: 100%;
    background: black;
    opacity: .5;
}
.container{
    position:relative;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">

<link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<div class="container">
  <div class="content-wrapper">

    @yield('content')

  </div>
</div>
<br><br>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.tiny.cloud/1/0k5i3ef6py7l9iy1gv8iwfgqxfkx7jlbrwt2r1hqqd0nprp7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@yield ('scripts')

</body>
</html>