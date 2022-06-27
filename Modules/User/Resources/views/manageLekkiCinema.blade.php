@extends('user::layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LEKKI CINEMA</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">LEKKI CINEMA</li>
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
                <h3 class="card-title">Table below shows all movies in Lekki Cinema</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:auto;">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <td colspan="12" id="header">
                      <h2>All Publications on Lekki <i class=" fa fa-clock"></i> ({{now()}})<h2>
                    </td>
                  </tr>
                  <tr>
                    <th width="340px">ADMIN</th>
                    <th width="340px">CAPTION</th>
                    <th width="340px">DETAILS</th>
                    <th width="135px">SHOW TIME</th>
                    <th width="200px">SHOW DATE</th>
                    <th width="135px">MOVIE</th>
                    <th width="100px">ACTION</th>
                  </tr>
                  @foreach($lekkiBranch as $item)
                  <tr>
                    <td width="80px">{{ $item->admin }}</td>
                    <td width="135px">{!! $item->caption !!}</td>
                    <td width="135px"><details>
                      <summary style="background-color:red; color:#fff;">
                        ...See <i class="fa fa-eye"></i> Details
                        About this Movie </summary>{!! $item->details !!} </details></td>
                    <td width="80px">{{ $item->time }}</td>
                    <td width="80px">{{ $item->date }}</td>
                    <td width="100px">

                        <video width="320" height="240" controls>
                          <source src="{{ asset($item->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                            style="border-radius: 100px">
                    </video></td>

                    <td width="100px">{{ $item->created_at }}</td>
                    <td width="340px">
                      <a onclick="return confirm('Are you sure you want to delete {{$item->full_name}}?')"
                        href="{{url('deleteLekkiCinema/'. $item->id)}}" data-toggle="tooltip"
                        title="Delete Publication Here">
                        <i class="fas fa-trash text-danger fa-lg"> </i></a>|
                      <a  href="{{ url('editLekkiCinema/'.$item->id) }}"
                        title="Edit LekkiCinema Content"> <i class="fas fa-edit btn btn-outline-info fa-lg"> </i></a>|
                        @if ($item->status==='published')
                        <a  href="{{ url('actionOnLekkiCinema/'.$item->id) }}"
                          title="Unpublish LekkiCinema Content"> <i class="fas fa-newspaper btn btn-outline-warning  fa-lg">
                            Unpublish</i></a>
                            @else
                            <a  href="{{ url('actionOnLekkiCinema/'.$item->id) }}"
                              title="Publish LekkiCinema Content"> <i class="fas fa-newspaper btn btn-outline-success  fa-lg">
                                Publish</i></a>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
              <div class="card-footer">
                <div class="card card-body bg-transparent">
                  {{ $lekkiBranch->links() }}
                </div>
              </div>
            </div>
            <!-- /.col -->
            <!-- Form To Add Compound-->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> <strong>CREATE A NEW CINEMA<strong></h4>
              </div>
              <div class="card card-body bg-transparent">
                <div class="row">
                  <form method="POST" enctype="multipart/form-data" action="{{ route('createLekkiCinema') }}" novalidate>
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <label for="title">MOVIE</label>
                        <input type="file" name="movie" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="title">SHOW TIME</label>
                        <input type="time" name="time" class="form-control">
                      </div>

                      <div class="col-md-6">
                        <label for="title">SHOW DATE</label>
                        <input type="date" name="date" class="form-control">
                      </div>


                      <div class="col-md-12">
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                          <div>
                            <label for="content">CAPTION</label><br>
                            <textarea id="editor" cols="30" rows="10" name="caption"
                              placeholder="Short Context 1000 character only..."></textarea>
                          </div>
                          @if ($errors->has('content'))
                          <span class="font-weight-bold">{{ $errors->first('content') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                          <div>
                            <label for="content">DETAILS</label><br>
                            <textarea id="editor" cols="30" rows="10" name="details"  placeholder="Add brief details..."></textarea>
                          </div>
                          @if ($errors->has('content'))
                          <span class="font-weight-bold">{{ $errors->first('content') }}</span>
                          @endif
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Create</button>
                      <a href="javascript:void(0)" onclick="window.history.back();"
                        class="btn btn-outline-primary btn-lg btn-block">Go Back</a>
                    </div>
                  </form>
                </div>
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
      title: 'Administrator! Here You Can Manage LekkiCinema Content'
    })
  </script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>
