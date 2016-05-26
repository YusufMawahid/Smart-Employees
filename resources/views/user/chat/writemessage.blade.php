@extends('user.menu')
@section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Employee
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">Send message</div>
                    <form action="sendmessage" method="POST" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="name" >
                        <input type="submit" value="send">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>
 
@endsection