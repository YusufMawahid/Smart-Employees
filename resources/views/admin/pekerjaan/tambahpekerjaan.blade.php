@extends('admin.home')
@section('content')

     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Job
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
                  <h3 class="box-title">Add Job</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="postkerja" method="POST" role="form">
                {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name Job" required />
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Salary</label>
                      <input type="text" class="form-control" name="pekerjaan" placeholder="Salary" required />
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
     function rupiah(nStr)
                        {
                           nStr += '';
                           x = nStr.split('.');
                           x1 = x[0];
                           x2 = x.length > 1 ? '.' + x[1] : '';
                           var rgx = /(\d+)(\d{3})/;
                           while (rgx.test(x1))
                           {
                             x1 = x1.replace(rgx, '$1' + '.' + '$2');
                           }
                           return "Rp. " + x1 + x2 +",00";
                        }
      $('input[name=pekerjaan]').mask('1000000000000',{reverse: true});
    </script>

@endsection