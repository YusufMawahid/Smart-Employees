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

