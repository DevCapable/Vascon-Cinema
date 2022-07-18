@extends('user::layouts.master')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>

              <form method="POST" action="{{ url('admin/logout') }}" novalidate>
                @csrf
                <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"><span class="iconify"
                    data-icon="fa-sign-out" data-inline="false"></span> </button>
              </form>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">

      <div class="row mt-12">
        <div class="col-md-12 offset-col-md-4">
          <div class="card">


            <div class="card-body">
              @if (Session::has('success'))
              <div class="alert alert-success">
                <span>{{ session('success') }}</span>
              </div>
              @endif
              @if (Session::has('danger'))
              <div class="alert alert-danger">
                <span>{{ session('danger') }}</span>
              </div>
              @endif
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <form method="post" action="{{ url('administrator/Manage_Users') }}" novalidate>
                        @csrf
                        <div class="form-group">
                          <label for="StudentSearchViewModel_Search"><strong>Search All Users</strong></label>
                          <input type="text" placeholder="Enter Any User Name e.g. Ade" class="form-control"
                            data-val="true" data-val-required="Search field is required."
                            id="StudentSearchViewModel_Search" name="question" value="" />
                          <span class="has-error text-danger field-validation-valid"
                            data-valmsg-for="StudentSearchViewModel.Search" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                          <button id="search-btn" class="btn btn-primary btn-sm pull-right">Search</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <section class="blog-page">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <div class="blog-item"> <img src="{{ asset('img/vas_new.png') }}" height="200" width="230"
                              class="img-responsive" alt="Admin logo" class="img-rounded">
                            <div class="date"></div>
                            <div class="down-content">
                              <div class="row">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'comment')"><i id="post"
                        class="fa fa-comments"></i></button>
                    <button class="tablinks" onclick="openCity(event, 'picture')"><i id="post"
                        class="fa fa-image"></i></button>
                    <button class="tablinks" onclick="openCity(event, 'video')"><i id="post"
                        class="fa fa-video"></i></button>
                    <div style="font-size: 12px;"><br><i class="fa fa-arrow-left"></i> What's on your
                      mind? Click on Tabs</div>
                  </div>
                  <form method="POST" action="{{ url('administrator/postingPublication') }}">
                    @csrf
                    <div id="comment" class="tabcontent">
                      <h3>Publish Comment Here </h3>
                      <div class="form-group {{ $errors->has('posting') ? 'has-error' : '' }}">
                        <textarea id="editor" cols="40" rows="4" name="posting"
                          placeholder="What's on your mind..."></textarea><br>
                        @if ($errors->has('posting'))
                        <span class="font-weight-bold">{{ $errors->first('posting') }}</span>
                        @endif
                      </div>
                      <div>
                          @can('post.create', Auth::user())
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>
                          @endcan
                      </div>
                    </div>
                  </form>
                  <form method="POST" action="{{ url('administrator/MoviePublication') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="picture" class="tabcontent">
                      <h3>Poublish Pictures Here</h3>
                      <div class="form-group {{ $errors->has('Movie') ? 'has-error' : '' }}">

                        <input type="file" name="Movie"><br>
                        @if ($errors->has('Movie'))
                        <span class="font-weight-bold">{{ $errors->first('Movie') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('MovieCaption') ? 'has-error' : '' }}">

                        <textarea id="text" cols="40" rows="4" name="MovieCaption"
                          placeholder="Movie Caption..."></textarea><br>
                        @if ($errors->has('MovieCaption'))
                        <span class="font-weight-bold">{{ $errors->first('MovieCaption') }}</span>
                        @endif
                      </div>
                      <div>
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>

                      </div>
                    </div>
                  </form>
                  <form method="POST" action="{{ url('administrator/videoPublication') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div id="video" class="tabcontent">
                      <h3>Publish Video Here</h3>
                      <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                        <input type="file" name="video">
                        @if ($errors->has('Video'))
                        <span class="font-weight-bold">{{ $errors->first('Video') }}</span>
                        @endif
                      </div>
                      <div class="form-group {{ $errors->has('videoCaption') ? 'has-error' : '' }}">
                        <textarea id="text" cols="40" rows="4" name="VideoCaption"
                          placeholder="Video Caption..."></textarea><br>
                        @if ($errors->has('VideoCaption'))
                        <span class="font-weight-bold">{{ $errors->first('VideoCaption') }}</span>
                        @endif
                      </div>
                      <div>
                        <button type="submit" id="postbutton" novallidate>PUBLISH</button>

                      </div>
                    </div>
                  </form>
                  <!--- end of posting tabs-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>AJAH CINEMA</h3>

                <p style="font-size:20px;font-weight:bold">AJAH CINEMA</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>LEKKI CINEMA</h3>

                <p style="font-size:12px;font-weight:bold">LEKKI CINEMA</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>IKEJA CINEMA</h3>

                <p style="font-size:20px;font-weight:bold">IKEJA CINEMA </p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>VAS SOLUTIONS</h3>

                <p style="font-size:20px;font-weight:bold">VAS SOLUTIONS</p>
              </div>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            <!--

    </section>
    <!-- /.content -->
          </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- ============================================================== -->
      </div>
    </section>
  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->

  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }


  </script>
{{--  @extends('user::layouts.footer')--}}
{{--  @extends('user::layouts.scripts')--}}
{{--</body>--}}
@stop
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  Toast.fire({
    icon: 'success',
    title: 'Administrator! Welcome Back home'
  })
</script>

