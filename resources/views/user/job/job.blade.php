@extends('user.menu')
@section('content')


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>Smart Employees</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Job Data</li>
          </ol>
        </section>
     <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Job Data</h3>
                </div>
                <div class="box-header">


             
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Job</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <?php $i = 1; ?>
                    @foreach ($job as $key => $data)
                    <tbody>
                      <tr>
                       <td><?php  echo $i; $i+=1; ?></td>
                       <td>{{$data->name}}</td>
                       <td>Rp. {{number_format($data->pekerjaan)}}</td>
                     </tr>
                    </tbody>
                    @endforeach
                    
                  </table>
                  </div>
                  <ul class="pagination" style="margin-left: 10px;margin-top:-5px;position: relative;">
                          {!! $job->render() !!}
                  </ul>
                  </div>
                </div>
              </div>

              </section>
              </div>

@endsection