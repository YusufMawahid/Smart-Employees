@extends('user.menu')
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
            <li class="active">Data Pekerjaan</li>
          </ol>
        </section>
     <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->

  <a href="" data-modal="#modal" class="modal__trigger" style="float:right;margin-top:-40px;">Report</a>
        <br>
  <!-- Modal -->
  <div id="modal" class="modal modal__bg" role="dialog" aria-hidden="true">
    <div class="modal__dialog">
      <div class="modal__content">
        <h1>Report by Job</h1>
        
        <label>Job</label>
       <select class="form-control" id="job" name="job_id" placeholder="Pekerjaan" required>
                        @foreach ($kar as $key => $data)
                        <option value="{{ $data->id }}">
                        {{ $data->name }}</option>
                        @endforeach
                      </select>
        <a href="{{ url('reportjob/'.$data->job_id) }}" target="_blank" class="btn btn-primary" style="margin-top:15px;">Report</a>
        <br>
        </div>
        <div class="form-group">
        <a href="" class="modal__close demo-close">
          <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
        </a>
      </div>
    </div>
  </div>


                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                       <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Division</th>
                        <th>Salary</th> 
                      </tr>
                    </thead>
                    <?php $i = 1; ?>
                   @foreach ($employee as $key => $data)
                    <tbody>
                      <tr>
                       <td><?php  echo $i; $i+=1; ?></td>
                       <td>{{$data->nama}}</td>
                       <?php
                       $divisi = App\Divisi::find($data->divisi);
                       $kar = App\Job::find($data->job_id);
                        ?>
                       <td>{{$kar->name}}</td>
                       <td>{{$divisi->nama}}</td>
                       <td></td>

                     </tr>
                    </tbody>
                    @endforeach
                  </table>
                  </div>
                  <ul class="pagination" style="margin-left: 10px;margin-top:-5px;position: relative;">
                          {!! $employee->render() !!}
                      </ul>
                  </div>
                </div>
              </div>

              </section>
              </div>
             
@endsection
