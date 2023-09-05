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
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <div class="row justify-content-center align-items-center">
        <div class="col-3">
            <div class="container mt-3">
              <h2 class="mt-3">ویرایش کاربر</h2>
              <form action="{{ url('user/UserEdit') }}" class="was-validated" method="post">
                @csrf
                @method('POST')
                    <div class="card-body">
                        <div class="form-floating mb-3 mt-3 ">
                            <input type="text" class="form-control" value="{{ $user->id }}" id="id" placeholder="Enter email" name="id" readonly>
                            <label for="pwd">Id</label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <input type="text" name="FirstName" value="{{ $user->Fname }}" class="form-control" id="FirstName" placeholder="...Type your First name" required>
                            <label for="FirstName">First Name</label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <input type="text" name="LastName" value="{{ $user->Lname }}" class="form-control" id="LastName" placeholder="...Type your Last name" required>
                            <label for="LastName">Last Name</label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <input type="number" min="999999999" value="{{ $user->MeliCode }}" max="9999999999" name="MelliCode" class="form-control" id="MelliCode" placeholder="" required>
                            <label for="MelliCode" class="ms-4">Melli Code</label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <input type="text" name="Address" value="{{ $user->Address }}" class="form-control" id="Address" placeholder="...Type your Address" required>
                            <label for="Address">Address</label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <input type="number" min="999999999" value="{{ $user->PostalCode }}" max="9999999999" name="PostalCode" class="form-control" id="PostalCode" placeholder="" required>
                            <label for="PostalCode"  class="ms-4">Postal Code</label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <select  class="form-select" required name="group">
                                @foreach ($groups as $group)
                                    @if ($group->Gname == $user->group_name)
                                        <option value="{{ $user->group_name }}" selected>{{ $group->Gname }}</option>
                                    @else
                                        <option>{{ $group->Gname }}</option>
                                    @endif
                                @endforeach
                            </select> 
                            <label for="Group">Group </label>
                        </div>

                        <div class="form-floating mb-3 mt-3 ">
                            <select  class="form-select" required name="gender">

                                
                                @foreach ($gender as $gen)
                                    @if ($gen == $user->Gender)
                                        <option value="{{ $gen }}" selected><?= $user->Gender ?></option>
                                    @else
                                        <option>{{ $gen}}</option>
                                    @endif
                                @endforeach
                            </select> 
                            <label for="Gender">Gender</label>
                        </div>

                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

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
