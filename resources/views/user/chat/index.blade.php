@extends('user.menu')
 @section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-8">
							Klik user di other users untuk mengirim pesan kepada user lain.
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

@endsection
