<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | فرم ساده</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ url('public/dist/css/bootstrap-rtl.min.css') }}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ url('public/dist/css/custom-style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">



<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-#6c757d navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <strong><a href="{{ url('') }}" class="nav-link">Dashboard</a></strong>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">علی ابراهیم نیا روشن</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fa fa-edit"></i>
                  <p>
                    فرم‌ها
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('user/Userform') }}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>ثبت اطلاعات کاربران</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('group/GroupsAddForm') }}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>ثبت اطلاعات  گروه ها</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    جداول
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('group/GroupsTable') }}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>جداول گروه ها</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    @if (count($groups) == 0)
      <center class="mt-5 p-5">
        <strong><p">Please Define The <i><a href="{{ url('group/GroupsAddForm') }}">Group</a></i> First So That The User Information Registration Form Is Display</p></strong>
      </center>
    @else
      <section class="content">
          <div class="container-fluid">
              <div class="row justify-content-center align-items-center">
                  <div class="col-md-6">
                      <!-- general form elements -->
                      <div class="card card-primary mt-5">
                        <div class="card-header">
                            <h3 class="card-title">فرم ثبت اطلاعات کاربر</h3>
                        </div>
                          <form role="form" class="was-validated" action="{{ url('user/AddUserform') }}" method="post">
                              @method('POST')
                              @csrf
                              <div class="card-body">
                                  <div class="form-floating mb-3 mt-3 ">
                                      <input type="text" name="FirstName" class="form-control" value="{{ old('FirstName') }}" id="FirstName" placeholder="نام خود را وارد کنید" required>
                                      <label for="FirstName">نام</label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3 ">
                                      <input type="text" name="LastName" class="form-control" value="{{ old('LastName') }}" id="LastName" placeholder="نام خانوادگی خود را وارد کنید" required>
                                      <label for="LastName">نام خانوادگی</label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3 ">
                                      <input type="number" min="999999999" max="9999999999" name="MelliCode" value="{{ old('MelliCode') }}" class="form-control" id="MelliCode" placeholder="" required>
                                      <label for="MelliCode" class="ms-4">کد ملی</label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3 ">
                                      <input type="text" name="Address" class="form-control" id="Address" value="{{ old('Address') }}" placeholder="آدرس خود را وارد کنید" required>
                                      <label for="Address">آدرس</label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3 ">
                                      <input type="number" min="999999999" max="9999999999" name="PostalCode" value="{{ old('PostalCode') }}" class="form-control" id="PostalCode" placeholder="" required>
                                      <label for="PostalCode" class="ms-4">کد پستی</label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3 ">
                                      <select class="form-select" required name="group" value="{{ old('group') }}">
                                          @foreach ($groups as $group)
                                              <option>{{$group->Gname}}</option>
                                          @endforeach
                                      </select> 
                                      <label for="Group">گروه </label>
                                  </div>

                                  <div class="form-floating mb-3 mt-3">
                                      <select class="form-select" required name="gender" value="{{ old('gender') }}">
                                          <option>مرد</option>
                                          <option>زن</option>
                                      </select> 
                                      <label for="Gender">جنسیت</label>
                                  </div>

                              </div>

                              <div class="card-footer">
                              <button type="submit" class="btn btn-primary">ارسال</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div><
      </section>
    @endif



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('public/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/dist/js/demo.js') }}"></script>
</body>
</html>
