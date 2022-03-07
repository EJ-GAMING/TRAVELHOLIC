<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading text-white">Core</div>
                            <a class="nav-link text-white" href="../home.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading text-white">Manage</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-user"></i></div>
                               User Account
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="user" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="tourist_spot.php"><i class="fas fa-globe mr-1"></i>Tourist Spot</a>
                                    <a class="nav-link" href="../user_account.php"><i class="fas fa-user mr-1"></i>User Account</a>
                                    <a class="nav-link" href="../provincial_tourism.php"><i class="fas fa-globe mr-1"></i>Provincial Tourism</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#request" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-list"></i></div>
                                Request <span class="ml-3 bg-danger text-center" style="width:20px;" id="total1">0</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="request" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../pending_req.php">
                                        <i class="fas fa-comment mr-1"></i>Pending Request<span class="ml-2 bg-danger text-center" style="width:20px;" id="total2">0</span></a>
                                    <a class="nav-link" href="../approved.php"><i class="fas fa-users mr-1"></i>List of Tourist</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading text-white">Reports</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#tourist" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-users"></i></div>
                                Tourist
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="tourist" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="perday.php"><i class="fas fa-comment mr-1"></i>Per Day</a>
                                    <a class="nav-link" href="per_month.php"><i class="fas fa-users mr-1"></i>Per Month</a>
                                    <a class="nav-link" href="per_year.php"><i class="fas fa-users mr-1"></i>Per Year</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo $user['fname']. ' '. $user['lname']?>
                    </div>
                </nav>
        </div>

                 
<script>
function loadDoc1() {

  setInterval(function(){

    var xhttp1 = new XMLHttpRequest();
  xhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("total1").innerHTML = this.responseText;
    }
  };
  xhttp1.open("GET", "total/total_request.php", true);
  xhttp1.send();


  },1000);
 
}
loadDoc1();


function loadDoc2() {

setInterval(function(){

  var xhttp2 = new XMLHttpRequest();
xhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   document.getElementById("total2").innerHTML = this.responseText;
  }
};
xhttp2.open("GET", "total/total_request.php", true);
xhttp2.send();


},1000);

}
loadDoc2();
</script>