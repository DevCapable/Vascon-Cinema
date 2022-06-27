@extends('user::layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONTENT RELATED TO FINANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Finance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @if (Session::has('success'))
        <div class="alert alert-success">
          <span>{{ session('success') }}</span>
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">
          <span>{{ session('error') }}</span>
        </div>
        @endif

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table below shows all the Publications of Finance</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:auto;">

                <video width="50%" height="50%" controls>
                  <source src="{{ asset($lekkiBranch->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                    style="border-radius: 100px">
            </video>
              </div>
              <div class="card-footer">
                <div class="card card-body bg-transparent">
                </div>
              </div>
            </div>
            <!-- /.col -->
            <!-- Form To Add Compound-->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> <strong>UPDATE CINEMA<strong></h4>
              </div>
              <div class="card card-body bg-transparent">

                <form method="POST" enctype="multipart/form-data" action="{{ route('changeFinanceMovie') }}" novalidate>
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <i style="display: none"> <input type="text" value="{{ $lekkiBranch->id }}" name="id"> </i>

                      <input type="file" name="Movie" class="form-control">

                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success">Change Movie</button>
                    </div>
                  </div>
                </form>
                <form method="POST" enctype="multipart/form-data" action="{{ route('updateFinance') }}" novalidate>
                  @csrf
                  <div class="row">
                    <i style="display: none"> <input type="text" value="{{ $finance->id }}" name="id"> </i>
                    <div class="col-md-12">
                      <div class="form-group {{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption">CAPTION</label>
                        <input type="text" name="caption" id="caption" class="form-control" value="{{ $lekkiBranch->caption}}"
                          placeholder="Enter caption">
                        @if ($errors->has('caption'))
                        <span class="font-weight-bold">{{ $errors->first('caption') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="title">SHOW TIME</label>
                      <input type="time" name="time" class="form-control" value="{!!
                        $lekkiBranch->time!!}">
                    </div>

                    <div class="col-md-6">
                      <label for="title">SHOW DATE</label>
                      <input type="date" name="date" class="form-control"value="{!!
                        $lekkiBranch->date!!}">
                    </div>
                    <div class="col-md-12">
                      <div class="form-group {{ $errors->has('details') ? 'has-error' : '' }}">
                        <div>
                          <label for="details">DETAILS</label><br>
                          <textarea id="editor" cols="30" rows="10" name="details" >{!!
                            $lekkiBranch->details!!}</textarea>
                        </div>
                        @if ($errors->has('details'))
                        <span class="font-weight-bold">{{ $errors->first('details') }}</span>
                        @endif
                      </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Update</button>
                    <a href="javascript:void(0)" onclick="window.history.back();"
                      class="btn btn-outline-primary btn-lg btn-block">Go Back</a>
                  </div>
                </form>

                <div class="card-footer">
                  <div class="card card-body bg-transparent">
                    Please enter a valid information
                  </div>
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      title: 'Administrator! Here You Can Edit Finance Content'
    })
  </script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
