@extends('admin.home')
@section('content')

<link rel="stylesheet" type="text/css" href="/css/popup.css">
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
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th colspan="4">Action</th>
                      </tr>
                    </thead>
                    <?php $i = 1; ?>
                    @foreach ($user as $key => $data)
                    <tbody>
                      <tr>
                       <td><?php  echo $i; $i+=1; ?></td>
                       <td>{{$data->nama}}</td>
                       <td>{{$data->jenis_kelamin}}</td>
                       <td>{{$data->no_hp}}</td>
                       <td>{{$data->email}}</td>
                       <td><a href="{{ url('deleteuser/'.$data->id)}}"><i class="fa fa-close"></i>  Delete</a></td>
                       <td><a href="{{ url('deletepeker/'.$data->id)}}"><i class="fa fa-edit"></i>  Edit</a></td>
                       <td><a href="{{ url('detail/'.$data->id)}}"><i class="fa fa-list"></i>  Detail</a></td>

                     </tr>
                    </tbody>
                    @endforeach
                  </table>
                  </div>
                  <ul class="pagination" style="margin-left: 10px;margin-top:-5px;position: relative;">
                          {!! $user->render() !!}
                      </ul>
                  </div>
                </div>
              </div>

              </section>
              </div>

@endsection