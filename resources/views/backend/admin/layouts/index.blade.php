<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
        integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('backend.admin.layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('backend.admin.layouts.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('backend.admin.layouts.footer')
            <!-- / Footer -->
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script>
        $(document).ready(function() {

            $('#formdata').validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: "required",
                    password: "required",
                    confirm_password: "required",
                    gender: {
                        required: true
                    },
                    image: {
                        required: true
                    },
                    role: "required",
                    role_type: "required",
                    admin_type: "required",
                    joining_date: "required",
                    status: "required"
                },
                messages: {
                    firstname: {
                        required: "Please enter your firstname!"
                    },
                    lastname: {
                        required: "Please enter your lastname!"
                    },
                    email: {
                        required: "Please enter your email!"
                    },
                    password: {
                        required: "Please enter your password!"
                    },
                    confirm_password: {
                        required: "Please enter your confirm_password!"
                    },
                    gender: {
                        required: "Please select gender!"
                    },
                    image: {
                        required: "Please select image!"
                    },
                    role: {
                        required: "Please select role!"
                    },
                    role_type: {
                        required: "Please select role_type!"
                    },
                    admin_type: {
                        required: "Please enter admin_type!"
                    },
                    joining_date: {
                        required: "Please select joining_date!"
                    },
                    status: {
                        required: "Please select status!"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.is("input:radio")) {
                        error.appendTo(element.parents('.lol'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#formdata").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '/adduser',
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(data) {


                        if (data.status == "1") {
                            toastr.success(data.message, {
                                timeOut: 1000
                            });
                            $('#modal').modal('hide');
                            $('#formdata').trigger("reset");
                            $('#tabledata').DataTable().ajax.reload();
                            $('#hid').val("");
                            $("#img").html("");
                        } else {
                            if (data.password_status == 1) {
                                toastr.error(data.message, {
                                    timeOut: 1000
                                });
                            }

                        }

                    }
                });
            });

            $("#modal").on("hidden.bs.modal", function() {
                $('#formdata').trigger("reset");
                $("#img").html("");
                $('#formdata').validate().resetForm();
                $('#formdata').find('.error').removeClass('error');
                $('#formdata').find('.is-invalid').removeClass('is-invalid');
                $('#formdata').find('.valid').removeClass('valid');
                $('#formdata').find('.is-valid').removeClass('is-valid');
                $('#roledropdown').hide();
                $('#admindropdown').hide();
                $('#hid').val("");

            });

            $('#tabledata').DataTable({
                destroy: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                ajax: {
                    url: '/listuser'
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "firstname"
                    },
                    {
                        data: "lastname"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "password"
                    },
                    {
                        data: "confirm_password"
                    },
                    {
                        data: "gender"
                    },
                    {
                        data: "image",
                        "orderable": false
                    },
                    {
                        data: "role"
                    },
                    {
                        data: "role_type"
                    },
                    {
                        data: "admin_type"
                    },
                    {
                        data: "joining_date"
                    },
                    {
                        data: "status",
                        "orderable": false
                    },
                    {
                        data: "action",
                        "orderable": false
                    }
                ]
            });

            $('#role').change(function() {
                var selectedRole = $(this).val();
                if (selectedRole === 'Admin') {
                    $('#roledropdown').hide();
                    $('#admindropdown').show();
                } else {
                    $('#roledropdown').show();
                    $('#admindropdown').hide();
                }
                $.ajax({
                    url: '/getoptions',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        selectedRole: selectedRole
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        var managers = response.managers;
                        var employees = response.employees;
                        var workers = response.workers;
                        var admins = response.admins;

                        if (selectedRole === 'Manager') {
                            $('#role_type').empty().append(
                                '<option value="" selected disabled>Select...</option>');
                            $.each(managers, function(index, manager) {
                                $('#role_type').append('<option value="' + manager.id +
                                    '">' + manager.manager + '</option>');
                            });
                        } else if (selectedRole === 'Employee') {
                            $('#role_type').empty().append(
                                '<option value="" selected disabled>Select...</option>');
                            $.each(employees, function(index, employee) {
                                $('#role_type').append('<option value="' + employee.id +
                                    '">' + employee.employee + '</option>');
                            });
                        } else if (selectedRole === 'Workers') {
                            $('#role_type').empty().append(
                                '<option value="" selected disabled>Select...</option>');
                            $.each(workers, function(index, worker) {
                                $('#role_type').append('<option value="' + worker.id +
                                    '">' + worker.worker + '</option>');
                            });
                        } else if (selectedRole === 'Admin') {
                            $('#admin_type').empty().append(
                                '<option value="" selected disabled>Select...</option>');
                            $.each(admins, function(index, admin) {
                                $('#admin_type').append('<option value="' + admin.id +
                                    '">' + admin.admin + '</option>');
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching role types:', error);
                    }
                });
            });

            $(document).on("click", "#statusCheckbox", function() {
                var isChecked = $(this).prop('checked');
                $.ajax({
                    url: '/update-admin-status',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        status: isChecked ? 1 : 0
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 1) {
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                confirmButtonColor: "#F0E68C"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $(document).on("click", "#edit_id", function() {
                var id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '/getuser',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $("#modal").modal("show");

                        $("#hid").val(response.Userdata.id);
                        $("#firstname").val(response.Userdata.firstname);
                        $("#lastname").val(response.Userdata.lastname);
                        $("#email").val(response.Userdata.email);
                        $("#password").val(response.Userdata.password);
                        $("#confirm_password").val(response.Userdata.confirm_password);
                        $('input[type="radio"]').filter('[value=' + response.Userdata.gender +
                            ']').prop("checked", true);
                        var image = "<img src='{{ asset('image/') }}/" + response.Userdata
                            .image +
                            "' width='100px' height='100px'>";
                        $("#img").html(image);
                        $("#role").val(response.Userdata.role);

                        if (response.Userdata.role == "Admin") {
                            $('#admindropdown').show();
                            var admin_type = response.response.Admin_data;
                            var html =
                                '<option value="" selected disabled>Select Admin_Type </option>';

                            for (let i = 0; i < admin_type.length; i++) {

                                if (response.Userdata.admin_type == admin_type[i].id) {

                                    html += "<option value='" + admin_type[i].id +
                                        "' selected >" +
                                        admin_type[i].admin + "</option>";
                                } else {
                                    html += "<option value='" + admin_type[i].id + "'>" +
                                        admin_type[i].admin +
                                        "</option>";
                                }
                            }
                            $('#admin_type').html(html);
                        } else if (response.Userdata.role == "Manager") {
                            $('#admindropdown').hide();
                            $('#roledropdown').show();
                            var role_type = response.response.Manager_data;
                            console.log(role_type);
                            console.log("role_type", role_type[0].manager);

                            var html =
                                '<option value="" selected disabled>Select Role_Type </option>';

                            for (let i = 0; i < role_type.length; i++) {
                                if (response.Userdata.role_type == role_type[i].id) {
                                    html += "<option value='" + role_type[i].id +
                                        "' selected >" +
                                        role_type[i].manager + "</option>";
                                } else {
                                    html += "<option value='" + role_type[i].id + "'>" +
                                        role_type[i].manager +
                                        "</option>";
                                }
                            }
                            $('#role_type').html(html);
                        } else if (response.Userdata.role == "Employee") {
                            $('#admindropdown').hide();
                            $('#roledropdown').show();
                            var role_type = response.response.Employee_data;
                            console.log(role_type);
                            console.log("role_type", role_type[0].employee);

                            var html =
                                '<option value="" selected disabled>Select Role_Type </option>';

                            for (let i = 0; i < role_type.length; i++) {
                                if (response.Userdata.role_type == role_type[i].id) {
                                    html += "<option value='" + role_type[i].id +
                                        "' selected >" +
                                        role_type[i].employee + "</option>";
                                } else {
                                    html += "<option value='" + role_type[i].id + "'>" +
                                        role_type[i].employee +
                                        "</option>";
                                }
                            }
                            $('#role_type').html(html);
                        } else if (response.Userdata.role == "Workers") {
                            $('#admindropdown').hide();
                            $('#roledropdown').show();
                            var role_type = response.response.Worker_data;
                            console.log(role_type);
                            console.log("role_type", role_type[0].worker);

                            var html =
                                '<option value="" selected disabled>Select Role_Type </option>';

                            for (let i = 0; i < role_type.length; i++) {
                                if (response.Userdata.role_type == role_type[i].id) {
                                    html += "<option value='" + role_type[i].id +
                                        "' selected >" +
                                        role_type[i].worker + "</option>";
                                } else {
                                    html += "<option value='" + role_type[i].id + "'>" +
                                        role_type[i].worker +
                                        "</option>";
                                }
                            }
                            $('#role_type').html(html);
                        }

                        $("#joining_date").val(response.Userdata.joining_date);
                        $("#status").val(response.Userdata.status);
                    }
                });
            });


            $(document).on("click", "#delete_id", function() {
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '/delete',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#tabledata').DataTable().ajax.reload();
                    }
                });
            });
        });
    </script>
  </body>
</html>
