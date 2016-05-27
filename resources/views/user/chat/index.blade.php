@extends('user.menu')
@section('content')
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<script>
	$(document).on('keydown','.send',function(e){
		var msg = $(this).val();
		var element = $(this);
		if (!msg == '' && e.keyCode == 13 && !e.shiftKey)
		{
			$.ajax({
				url:'{{url("test/add")}}',
				type:'post',
				data:{_token:'{{csrf_token()}}',msg:msg},

			});
			element.val('');
		}
	});
	$(function(){
		liveChat();
	});


	function liveChat()
	{
		$.ajax({
			url:'{{url("ajax")}}',
			dataType:'json',
			data:{_token:'{{csrf_token()}}'},
			success:function(data)
			{
				$('.chat-box').append('<div class="alert alert-info">'+data.msg+'</div>');
				setTimeout(liveChat,1000);
			},
			error:function()
			{
				setTimeout(liveChat,1000);
			}
		});
	}
</script>

<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-8">
              <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-titile">Chatting User</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div><!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	@foreach($chats as $chat)
							<div class="alert alert-info">{{$chat->msg}}</div>
						@endforeach
                      </div><!-- /.direct-chat-text -->
                    </div><!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div><!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        @foreach($chats as $chat)
							<div class="alert alert-info">{{$chat->msg}}</div>
						@endforeach
                      </div><!-- /.direct-chat-text -->
                    </div><!-- /.direct-chat-msg -->
                  </div><!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg">
                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div><!-- /.contacts-list-info -->
                        </a>
                      </li><!-- End Contact Item -->
                    </ul><!-- /.contatcts-list -->
                  </div><!-- /.direct-chat-pane -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                      <span class="input-group-btn">
                        <input type="text" class="form-control send"><br>
                        <button type="button" class="btn btn-primary btn-flat">Send</button>
                      </span>
                    </div>
                </div><!-- /.box-footer-->
              </div><!--/.direct-chat -->
              </div><!-- /.box -->
            </div><!-- ./col -->
                </div><!-- /.box-body -->
 
            <div class="col-md-3">
             
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <br>

              <div class="box box-solid" style="margin-top:17px;">
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="/user/video"><i class="fa  fa-youtube-play"></i> Video Call</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </section>
</div>
<!-- 
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="chat-box">
			@foreach($chats as $chat)
				<div class="alert alert-info">{{$chat->msg}}</div>
			@endforeach
			</div>
			<input type="text" class="form-control send">
		</div>
	</div>
</div>
 -->
@endsection