@extends('admin.home')
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
                <div class="box-header with-border">
                  <h3 class="box-title">Add Employee</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('adminpostedit'.'/'.$edit->id)}}" method="POST" role="form" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$edit->id}}">
                <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" name="nama" placeholder="Name" value="{{$edit->nama}}" required>
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
                      <input type="text" class="form-control" name="uang_makan" value="{{$edit->uang_makan}}" data-inputmask='"mask": "999999"' data-mask required>
                    </div>
                  
                    <div class="form-group">
                    <label>Day of birth</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar" ></i>
                      </div>
                      <input type="text" name="tgl_lahir" value="{{$edit->tgl_lahir}}" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>
                    </div><!-- /.input group -->
                  </div>

                    <div class="form-group">
                    <label>Gender</label>
                    <select name="jenis_kelamin"  class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="{{$edit->jenis_kelamin}}">Man</option>
                      <option value="{{$edit->jenis_kelamin}}">Woman</option>
                    </select>
                  </div><!-- /.form-group -->

                  <div class="form-group">
                    <label>Age</label>
                    <select name="umur" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="19 tahun">19 tahun</option>
                      <option value="20 tahun">20 tahun</option>
                      <option value="21 tahun">21 tahun</option>
                      <option value="22 tahun">22 tahun</option>
                      <option value="23 tahun">23 tahun</option>
                      <option value="24 tahun">24 tahun</option>
                      <option value="25 tahun">25 tahun</option>
                      <option value="26 tahun">26 tahun</option>
                      <option value="27 tahun">27 tahun</option>
                      <option value="28 tahun">28 tahun</option>
                      <option value="29 tahun">29 tahun</option>
                      <option value="30 tahun">30 tahun</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected"></option>
                      <option value="Sudah Menikah" >Sudah Menikah</option>
                      <option value="Belum Menikah">Belum Menikah</option>
                    <input id="username" name="roles" type="hidden" class="validate" required="required" value="admin">
                    </select>
                  </div><!-- /.form-group -->

                   <div class="form-group">
                      <label>Address</label>
                      <textarea  class="form-control" name="alamat" rows="3" placeholder="Enter ..." required>{{$edit->alamat}}</textarea>
                    </div>

                  <div class="form-group">
                    <label>Telephone</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" value="{{$edit->no_hp}}" name="no_hp" class="form-control" data-inputmask='"mask": "(999) 999-999-999"' data-mask required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                    <div class="form-group">
                    <label>Account Number</label>
                      <input type="text" name="norek" value="{{$edit->norek}}" class="form-control" data-inputmask='"mask": "99999-99999-99999"' data-mask required>
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" value="{{$edit->email}}" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                <li>
                    <label for="exampleInputEmail1">Photo</label>
                    <div class="timeline-body">
                      <img src="{{ url('images/'.$edit->photo) }}" style="width:215px;" alt="..." class="margin">
                    </div>
                </li>
                     <div class="form-group">
                      <label>Photo</label>
                      <input name="photo" id="file" type="file" required>
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
    <script>
      $('#job').change(function() {
        
      });
    </script>
    
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
                function getGaji(str)
                {
                    var xhttp;
                    if (str == "")
                    {
                        document.getElementById("items_id_array").innerHTML = "items_id_array";
                        return;
                    }
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function()
                    {
                        if (xhttp.readyState == 4 && xhttp.status == 200)
                        {
                          // console.log(xhttp.responseText);
                            var responseText = $.parseJSON(xhttp.responseText);
                            //items_id_array
                            var gaji = rupiah(responseText['pekerjaan']);
                            var job = responseText['job'];
                            $("#pekerjaan").val(gaji);
                            $("#gaji").val(gaji);
                        
                        }
                    };
                    xhttp.open("GET", "/karyawan/pekerjaanAsJSON/"+str, true);
                    xhttp.send();
                }
                


                function getDivisi(str)
                {
                    var xhttp;
                    if (str == "")
                    {
                        document.getElementById("items_id_array").innerHTML = "items_id_array";
                        return;
                    }
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function()
                    {
                        if (xhttp.readyState == 4 && xhttp.status == 200)
                        {
                          // console.log(xhttp.responseText);
                            var responseText = $.parseJSON(xhttp.responseText);
                            //items_id_array
                            var code = responseText['code'];
                            var nama = responseText['code_div'];
                            $("#code").val(code);
                            $("#nama").val(code);
                        }
                    };
                    xhttp.open("GET", "/karyawan/divisiAsJSON/"+str, true);
                    xhttp.send();
                }
                </script>
    </div>

@endsection