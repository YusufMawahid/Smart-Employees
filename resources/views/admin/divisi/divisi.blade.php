@extends('admin.home')
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
            <li class="active">Division Data</li>
          </ol>
        </section>
     <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Division</th>
                        <th>Code</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <?php $i = 1; ?>
                    @foreach ($divisi as $key => $data)
                    <tbody>
                      <tr>
                      <td><?php  echo $i; $i+=1; ?></td>
                       <td>{{$data->nama}}</td>
                       <td>{{$data->code}}</td>
                       <td><a href="{{ url('deletediv/'.$data->id) }}"><button class="btn btn-block btn-primary" style="width: 100px;">Delete</button></a></td>
                     </tr>
                    </tbody>
                    @endforeach
                    
                  </table>
                  </div>
                  <ul class="pagination" style="margin-left: 10px;margin-top:-5px;position: relative;">
                  {!! $divisi->render() !!}
                   </ul>
                  </div>
                </div>
              </div>

              </section>
              </div>

      <div class="control-sidebar-bg"></div>
    </div>
    
@endsection