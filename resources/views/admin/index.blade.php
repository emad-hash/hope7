<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- bootstrap 5 css -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"/>
    <!-- BOX ICONS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet"/>
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('style/admin.css')}}"/>
    @yield('style')

</head>

<body>
<!-- Side-Nav -->
<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar" style="background: #13C5DD; ">
    <ul class="nav flex-column text-white w-100">
        <a href="#" class="nav-link h3 text-white my-2">
            <span style="color:#1D2A4D;">Hope Admin Dashboard</span>
        </a>
        <a href="/admin" class="nav-link">
            <i class="bx bxs-dashboard" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">Overview</span>
        </a>
        <a href="/admin/allUsers" class="nav-link">
            <i class="bx bx-user-check" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">All Users</span>
        </a>

        <a href="/admin/allDepartments" class="nav-link">
            <box-icon type='solid' name='building-house' style="color:#1D2A4D; height:20px; width:15px;"></box-icon>
            <span class="mx-2" style="color:#1D2A4D;">All Departments</span>
        </a>

        <a href="/admin/allDoctor" class="nav-link">
            <i class="bx bx-conversation" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">All Doctors</span>
        </a>
        <a href="/admin/allProduct" class="nav-link">
            <i class="bx bxl-product-hunt" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">All Products</span>
        </a>
        <a href="/admin/allAppointment" class="nav-link">
            <i class="bx bx-plus-medical" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">All Appointments</span>
        </a>
        <a href="/admin/allOrder" class="nav-link">
            <i class='bx bx-package' style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">All Orders</span>
        </a>

        <a href="/admin/allDonations" class="nav-link">
            <box-icon type='solid' name='donate-heart' style="color:#1D2A4D; height:20px; width:15px;"></box-icon>
            <span class="mx-2" style="color:#1D2A4D;">All Donations</span>
        </a>

        <a href="/" class="nav-link">
            <i class="fa-solid fa-arrow-left" style="color:#1D2A4D;"></i>
            <span class="mx-2" style="color:#1D2A4D;">Home Page</span>
        </a>
    </ul>



</div>

<!-- Main Wrapper -->
<div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-light bg-light px-5">
        {{-- <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a> --}}
    </nav>
    @yield('content')
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- bootstrap js -->
<script src="{{asset('js/admin.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
</body>

</html>
