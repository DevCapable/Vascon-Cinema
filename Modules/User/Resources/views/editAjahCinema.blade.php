<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin | Dashboard</title>
  @extends('user::layouts.styles')
  <style>
    .help-block {
      color: #dc3545;
    }

    .has-error {
      color: #dc3545;
    }

    summary {
      background-color: greenyellow;
      font-size: 15px;
    }

    summary:hover {
      color: rgb(240, 218, 218);
      background-color: green;
    }
  </style>
</head>

<body style="padding-top: 1px">
  <!-- sidebar -->
  @extends('user::layouts.sidebar')
  <!-- Navbar -->
  <!---NAVBAR HERE-->
  @extends('user::layouts.navbar')
  <!-- NAVBAR ENDS HERE--->
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONTENT RELATED TO AJAH CINEMA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ajah Cinema</li>
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
                <h3 class="card-title">Table below shows all the Ajah Cinema</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:auto;">

                <video width="50%" height="50%" controls>
                  <source src="{{ asset($ajahBranch->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
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

                <form method="POST" enctype="multipart/form-data" action="{{ route('changeAjahCinemaMovie') }}" novalidate>
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <i style="display: none"> <input type="text" value="{{ $ajahBranch->id }}" name="id"> </i>
                     
                      <input type="file" name="movie" class="form-control">
                     
                    </div>
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success">Change Movie</button>
                    </div>
                  </div>
                </form>
                <form method="POST" enctype="multipart/form-data" action="{{ route('updateAjahCinema') }}" novalidate>
                  @csrf
                  <div class="row">
                    <i style="display: none"> <input type="text" value="{{ $ajahBranch->id }}" name="id"> </i>
                    <div class="col-md-12">
                      <div class="form-group {{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption">CAPTION</label>
                        <input type="text" name="caption" id="caption" class="form-control" value="{!! 
                          $ajahBranch->caption!!}"
                          placeholder="Enter Caption">
                        @if ($errors->has('caption'))
                        <span class="font-weight-bold">{{ $errors->first('caption') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="time">SHOW TIME</label>
                      <input type="time" name="time" class="form-control" value="{!!
                        $ajahBranch->time!!}">
                    </div>
                    
                    <div class="col-md-6">
                      <label for="date">SHOW DATE</label>
                      <input type="date" name="date" class="form-control" value="{!!
                        $ajahBranch->date!!}">
                    </div>
                    <div class="col-md-12">
                      <div class="form-group {{ $errors->has('deatils') ? 'has-error' : '' }}">
                        <div>
                          <label for="deatils">DETAILS</label><br>
                          <textarea id="editor" cols="30" rows="10" name="details" >{!!
                            $ajahBranch->details!!}</textarea>
                        </div>
                        @if ($errors->has('deatils'))
                        <span class="font-weight-bold">{{ $errors->first('deatils') }}</span>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @extends('user::layouts.footer')
  @extends('user::layouts.scripts')
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
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
      title: 'Administrator! Here You Can Edit ajah Branch Cinema'
    })
  </script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>