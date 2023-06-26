<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#323E6F">
      <!-- Sidebar - Brand -->

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
  

      <!-- Nav Item - Dashboard -->
      <li class="mt-4 text-center">
        <a class="text-white" href="dashboard.php" style="text-decoration: none;">
          <span style="font-size: 25px;text-shadow: 1px 0px 2px;"><?php echo $InstitudeName?></span>
          <div style="font-size: 20px;text-shadow: 1px 0px 2px;">(<?php echo $CampusName.' Campus'?>)</div>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <br>




      <!-- Nav Item HOME -->
      <li class="nav-item">
        <a class="nav-link collapsed font-weight-bold text-white" href="dashboard.php" style="background-color: #909090;padding:8px;">
          <img src="pics/home.png" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2 " style="font-size: 11px">Home</span>
        </a>
      </li>



      <!-- Nav Item -Deparment -->
      <li class="nav-item">
        <a class="nav-link collapsed mt-2 " href="" data-toggle="collapse" data-target="#collapseDep" aria-expanded="true" aria-controls="collapseDep" style="background-color: #909090;padding:8px">
          <img src="pics/Deparment.png" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2  font-weight-bold text-white" style="font-size:11px">Departments</span>
        </a>
        <div id="collapseDep" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item bg-light" href="viewdepartment.php" style="padding: 8px">
              <i class="fas fa-list ml-1" style="font-size: 15px;color: orange"></i>
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Department List</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/account.png" class="icon" style="height: 17px;width: 22px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Accounts</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/admission.png" class="icon" style="height: 17px;width: 22px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Admissions</span>
            </a>
            <a class="collapse-item  bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/exams.png" class="icon" style="height: 17px;width: 22px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Examination</span>
            </a>
            <a class="collapse-item  bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/teacher.PNG" class="icon" style="height: 17px;width: 22px;"><span class="ml-3 font-weight-bold" style="font-size:12px;">Teachers</span>
            </a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">


      <div class="sidebar-heading mb-2">
        Employee Area
      </div>


      <!-- Nav Item -Employee -->
      <li class="nav-item">
        <a class="nav-link collapsed" style="background-color: #909090;padding:8px" href="" data-toggle="collapse" data-target="#collapseEmp" aria-expanded="true" aria-controls="collapseEmp">
          <img src="pics/manyemployee.png" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2  font-weight-bold text-white" style="font-size:11px">Employees</span>
        </a>
        <div id="collapseEmp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item bg-light" href="addemployee.php" style="padding: 8px">
              <img src="pics/employee.png" class="icon" style="height: 17px;width: 20px;">
              <i class="fas fa-plus" style="font-size: 10px"></i>
              <span class="ml-1 font-weight-bold" style="font-size:12px;">New Employee</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewemployee.php" style="padding: 8px">
              <img src="pics/employee.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-3 font-weight-bold" style="font-size:12px;">Employee List</span>
            </a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading mb-2">
        Student Area
      </div>


      <!-- Nav Item -Deparment -->
      <li class="nav-item">
        <a class="nav-link collapsed" style="background-color: #909090;padding:8px" href="" data-toggle="collapse" data-target="#collapseStud" aria-expanded="true" aria-controls="collapseStud">
          <img src="pics/students.png" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2  font-weight-bold text-white" style="font-size:11px">Students</span>
        </a>
        <div id="collapseStud" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item bg-light" href="addinquiry.php" style="padding: 8px">
              <img src="pics/Inquiry.png" class="icon" style="height: 17px;width: 20px;">
              <i class="fas fa-plus" style="font-size: 10px"></i>
              <span class="ml-2 font-weight-bold" style="font-size:12px;">New Inquiry</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewinquiry.php" style="padding: 8px">
              <img src="pics/Inquiry.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-3 font-weight-bold" style="font-size:12px;">Inquiry List</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="addstudent.php" style="padding: 8px">
              <img src="pics/student.png" class="icon" style="height: 17px;width: 20px;">
              <i class="fas fa-plus" style="font-size: 10px"></i>
              <span class="ml-2 font-weight-bold" style="font-size:12px;">New Student</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewstudent.php" style="padding: 8px">
              <img src="pics/student.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-3 font-weight-bold" style="font-size:12px;">Student List</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewfeevoucher.php" style="padding: 8px">
              <img src="pics/voucher.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-3 font-weight-bold" style="font-size:12px;">Fee Voucher</span>
            </a>
            <a class="collapse-item  bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/guardian.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Parents List</span>
            </a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading mb-2">
        Class Setup
      </div>

      

      <!-- Nav Item -Setup -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseSetup" aria-expanded="true" aria-controls="collapseSetup" style="background-color: #909090;padding:8px">
          <img src="pics/setup.PNG" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2  font-weight-bold text-white" style="font-size:11px">Campus Setup</span>
        </a>
        <div id="collapseSetup" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item bg-light mt-1" href="viewbatch.php" style="padding: 8px">
              <img src="pics/admited.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Batch</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewdiscipline.php" style="padding: 8px">
              <img src="pics/discipline.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Discipline</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewclass.php" style="padding: 8px">
              <img src="pics/classes.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Classes</span>
            </a>
            <a class="collapse-item bg-light mt-1 mt-1" href="viewgroups.php" style="padding: 8px">
              <img src="pics/group.png" class="icon"style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Groups</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewboards.php" style="padding: 8px">
              <img src="pics/board.png" class="icon"style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Boards</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewsubjects.php" style="padding: 8px">
              <img src="pics/subjects.png" class="icon"style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Subjects</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="viewfee.php" style="padding: 8px">
              <img src="pics/fee.png" class="icon"style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Fee Structure</span>
            </a>
          </div>
        </div>
      </li>

      <div class="sidebar-heading mt-3 mb-2">
        Account Setting
      </div>

      <!-- Nav Item -Setup -->
      <li class="nav-item">
        <a class="nav-link collapsed" style="background-color: #909090;padding:8px" href="" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
          <img src="pics/setting.png" class="icon" style="height: 30px;width: 30px;border-radius: 3px;">
          <span class="ml-2  font-weight-bold text-white" style="font-size:11px">Setting</span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class=" py-2 collapse-inner rounded">
            <a class="collapse-item bg-light mt-1" href="manageaccount.php" style="padding: 8px">
              <img src="pics/profile.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Manage Account</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="" style="padding: 8px">
              <img src="pics/password.png" class="icon" style="height: 17px;width: 20px;">
              <span class="ml-2 font-weight-bold" style="font-size:12px;">Change Password</span>
            </a>
            <a class="collapse-item bg-light mt-1" href="logout.php" style="padding: 8px">
                <img src="pics/logout.png" class="icon" style="height: 17px;width: 20px;">
                <span class="ml-2 font-weight-bold" style="font-size:12px;">Logout</span>
              </a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

     

    </ul>
    <!-- End of Sidebar -->
</body>
</html>