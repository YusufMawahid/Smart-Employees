@extends('admin.home')
@section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Divisi
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Divisi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="postdivisi" method="POST" role="form">
                {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="nama" placeholder="Division name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Code</label>
                      <input type="text" class="form-control" name="code" placeholder="Code">
                    </div>
                    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
        </section>
       </div>

     
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

   

    <script src="js/jquery.mask.min.js"></script>
     <script type="text/javascript">
      $('input[name=code]').mask('0000',{reverse: true});
    </script>
@endsection