@extends('admin.home')
@section('content')
<style>
.imgs {
    max-width:100%;
    height: auto;
  }
</style>
      <div class="content-wrapper">
      
        <section class="content-header">

<div class="row">
      <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-titile">Detail of {{ $detail->nama }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">

                 
                  <br><br>
                    <dt>Name</dt>
                    <dd>{{ $detail->nama }}</dd><br>

                    <dt>Email</dt>
                    <dd>{{ $detail->email }}</dd><br>
                    
                    <?php $kar = App\Job::find($detail->job_id); ?>
                    <dt>Job</dt>
                    <dd>{{ $kar->name }}</dd><br>
                    
                    <dt>Gaji</dt>
                    <dd>{{ $detail->gaji }}</dd><br>
                    

                     <?php $divisi = App\Divisi::find($detail->divisi); ?>
                    <dt>Division</dt>
                    <dd>{{ $divisi->nama }}</dd><br>

                    <dt>Code</dt>
                    <dd>{{ $detail->code_div }}</dd><br>

                    <dt>Telephone</dt>
                    <dd>{{ $detail->no_hp }}</dd><br>
                   
                    <dt>Meal Allowance</dt>
                    <dd>{{ $detail->uang_makan }}</dd><br>
                   
                    <dt>Tanggal Lahir</dt>
                    <dd>{{ $detail->tgl_lahir }}</dd><br>
                   
                    <dt>Jenis Kelamin</dt>
                    <dd>{{ $detail->jenis_kelamin }}</dd><br>
                   
                    <dt>Address</dt>
                    <dd>{{ $detail->alamat }}</dd><br>
                   
                    <dt>Account number</dt>
                    <dd>{{ $detail->norek }}</dd><br>
                   
                   
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- ./col -->
            <div class="col-md-5">
            <div class="box box-solid" >
              <div class="box-header with-border">
                  <h3 class="box-title">Image of {{ $detail->nama }}</h3>
                </div>
                <div class="box-body">
                    <img src="/images/{{ $detail->photo }}" class="imgs">
                </div>
              </div>
            </div>
            
        </div>
    </section>
</div>

@endsection