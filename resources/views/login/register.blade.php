</!DOCTYPE html>
<html>
<head>
  <title>Register Smart Employees</title>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>

</head>
<body style="background-image: url('/img/login.jpg'); background-repeat:round; ">

        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-left:610px;">
          <h1>
           <a href="/">Smart Employees</a>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content" style="margin-left:450px; opacity:0.9;">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Register for free</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <form action="register" method="POST" role="form" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="nama" placeholder="Name" required>
                    </div>

                   <div class="form-group">
                      <label>Job</label>
                      <select class="form-control" id="job" name="job_id" placeholder="Pekerjaan" onchange="getGaji(this.value)" required>
                        @foreach ($kar as $key => $data)
                        <option value="{{ $data->id }}">
                        {{ $data->name }}</option>
                        @endforeach
                      </select>
                    </div>

                   <div class="form-group">
                      <label>Salary</label>
                      {{--<select class="form-control" id="gaji" name="gaji" placeholder="Pekerjaan" required disabled="">
                        @foreach ($kar as $key => $data)
                        <option value="{{ $data->name }}">
                        {{ number_format( $data->pekerjaan) }}</option>
                        @endforeach
                      </select>--}}
                      <input disabled id="gaji" class="form-control">
                      <input type="hidden" id="pekerjaan" name="pekerjaan" class="form-control">
                    </div>
                   
                   <div class="form-group">
                      <label>Division</label>
                      <select class="form-control" name="divisi" placeholder="Division" onchange="getDivisi(this.value)" required>
                        @foreach ($div as $key => $data)
                        <option value="{{ $data->id }}">
                        {{ $data->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                      <div class="form-group">
                      <label>Code</label>
                      {{--<select class="form-control" id="code" name="code" placeholder="Code" required disabled="">
                        @foreach ($div as $key => $data)
                        <option value="{{ $data->code }}">
                        {{ str_replace("Rp.", "",$data->code) }}</option>
                        @endforeach
                      </select>--}}
                      <input disabled id="code" class="form-control">
                      <input type="hidden" id="nama" name="code_div" class="form-control">
                    </div>

                     <div class="form-group">
                      <label>Meal Allowance</label>
                      <input type="text" class="form-control" name="uang_makan" data-inputmask='"mask": "999999"' data-mask required>
                    </div>
                  
                    <div class="form-group">
                    <label>Day of birth</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar" ></i>
                      </div>
                      <input type="text" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                    </div><!-- /.input group -->
                  </div>

                    <div class="form-group">
                    <label>Gender</label>
                    <select name="jenis_kelamin" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="Man" >Man</option>
                      <option value="Woman">Woman</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Age</label>
                    <select name="umur" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="19 tahun">19 tahun</option>
                      <option value="20 tahun">20 tahun</option>
                      <option value="20 tahun">21 tahun</option>
                      <option value="20 tahun">22 tahun</option>
                      <option value="20 tahun">23 tahun</option>
                      <option value="20 tahun">24 tahun</option>
                      <option value="20 tahun">25 tahun</option>
                      <option value="20 tahun">26 tahun</option>
                      <option value="20 tahun">27 tahun</option>
                      <option value="20 tahun">28 tahun</option>
                      <option value="20 tahun">29 tahun</option>
                      <option value="20 tahun">30 tahun</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="user" >Sudah Menikah</option>
                      <option value="user">Belum Menikah</option>
                    <input id="username" name="roles" type="hidden" class="validate" required="required" value="user">
                    </select>
                  </div><!-- /.form-group -->

                   <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="alamat" rows="3" placeholder="Enter ..." required></textarea>
                    </div>

                  <div class="form-group">
                    <label>Telephone</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" name="no_hp" class="form-control" data-inputmask='"mask": "(999) 999-999-999"' data-mask required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                    <div class="form-group">
                    <label>Account Number</label>
                      <input type="text" name="norek" class="form-control" data-inputmask='"mask": "99999-99999-99999"' data-mask required>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                     <div class="form-group">
                      <label>Photo</label>
                      <input name="photo" id="file" type="file" required>
                    </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="box-header with-border">
                  <h3 class="box-title">Already have an account?<a href="login"> Click here to Login</a></h3>
                </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
        </section>
       </div>

 
      <div class="control-sidebar-bg"></div>
      <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="js/pages/jquery.mask.min.js"></script>

    
   <script>
      //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

   </script>
    
  
<script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="/https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->


</body>
</html>

