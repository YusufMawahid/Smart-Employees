@extends('user.menu')
@section('content')

<script type="text/javascript">
  $(document).ready(function(){

    var dm = document.getElementById('msg-chat');
    // dm.scrollTop = dm.scrollHeight;
    dm.scrollTop = dm.scrollHeight;

    function reloadMessage() {
      $('.direct-chat-messages').load('{{ url('api/messages'.'/'.$user->id) }}');
    }

    setInterval(reloadMessage,500);

    $('#create_form').submit(function(e){
      e.preventDefault();
      if ($('#msg').val()=='') {
        alert('Pesan tidak boleh kosong.');
      }

      else {
        $.ajax({
          url: '{{ url('messages') }}',
          type: 'post',
          data: $(this).serializeArray(),
          success:function(data){
            $('#msg').val('');
            setInterval(function () {
              var ca = document.getElementById('msg-chat');
              // dm.scrollTop = dm.scrollHeight;
              ca.scrollTop = ca.scrollHeight;
            }, 500);
          },
          error:function(){
            alert('Ajax Error');
          }
        });
      }
    });
  });
</script>

<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-8">
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $user->nama }}</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="msg-chat">
                    @foreach($messages as $message)
                    @if($message->user_id==auth()->user()->id)
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">{{ $message->user->nama }}</span>
                        <span class="direct-chat-timestamp pull-left">{{ $message->created_at }}</span>
                      </div><!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{ url('images'.'/'.$message->user->photo) }}" alt="{{ $message->user->nama }}"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{ $message->msg }}
                      </div><!-- /.direct-chat-text -->
                    </div><!-- /.direct-chat-msg -->
                    @else
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{ $message->user->nama }}</span>
                        <span class="direct-chat-timestamp pull-right">{{ $message->created_at }}</span>
                      </div><!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{ url('images'.'/'.$message->user->photo) }}" alt="{{ $message->user->nama }}"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {{ $message->msg }}
                      </div><!-- /.direct-chat-text -->
                    </div><!-- /.direct-chat-msg -->
                    @endif
                    @endforeach

                  </div><!--/.direct-chat-messages-->

                </div><!-- /.box-body -->
                <div class="box-footer">
                  <form id="create_form">
                    <input type="hidden" name="user_id" value="{{ $user_login->id }}">
                    <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                    <div class="input-group">
                      <input type="text" name="msg" placeholder="Type Message ..." class="form-control" id="msg">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                    </div>
                  </form>
                </div><!-- /.box-footer-->
              </div><!--/.direct-chat -->
            </div>

             <div class="col-md-3">

               <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Other Users</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
										@foreach($users as $user)
										<li><a href="{{ url('messages'.'/'.$user->id) }}">{{ $user->nama }}</a></li>
										@endforeach
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->

              <div class="box box-solid" style="margin-top:17px;">
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="/user/video"><i class="fa fa-youtube-play"></i> Video Call</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </section>
</div>

@endsection
