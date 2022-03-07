<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="home.php">TRAVELHOLIC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="h5 text-light"><?php echo $user['fname']; ?> </span><img class="rounded-circle" src="<?php echo (!empty($user['photo'])) ? 'includes/PROFILE/upload/'.$user['photo'] : '../photo/profile.jpg';?>"height="40px" class="img-rounded"/></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#view_profile"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                        <li>
                        <a href="profile.php" class="dropdown-item"><i class="fa fa-edit"></i> Update Profile</a>
                        </li>
                        <li>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update_account"><i class="fa fa-lock"></i> Update Account</a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-sign-out-alt"></i> Log Out</a>

                        </li>
                       
                    </ul>
                </li>
            </ul>
        </nav>


         <!-- LOGOUT Modal -->
         <form action="includes/LOGIN_QUERY/logout.php" method="POST" >
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Travelholic Tourbooking System</h5>
       
      </div>
      <div class="modal-body">
       Are your sure you want to Log Out?
       
      </div>
      <div class="modal-footer bg-light">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> <strong>Cancel</strong></button>
        <button type="submit" class="btn btn-danger" name="logout"><i class="fa fa-sign-out-alt"></i> <strong>Logout</strong></button>
      </div>
          </form>
    </div>
  </div>
</div>