<?php include_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TRAVELHOLIC: Online Tourbooking</title>
    <script src="js/adapter.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/instascan.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <?php include_once 'disable_right_click.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php include_once 'sidebar.php'; ?>

    <div id="layoutSidenav_content">
        <main>

            <div class="container-fluid px-4">
                <h1 class="mt-3">Scan QR CODE</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">QR CODE</li>
                </ol>

                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-8 text-center h4">
                        <?php include 'includes/msg.php'; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md ">
                        <label class="h1 d-flex justify-content-center">Scan Here</label>
                        <center><video id="preview" width="60%" class="bg-dark"></video></center>
                        <form action="includes/QRCODE/scan_qrcode.php" method="post">
                            <input type="hidden" name="qrcode" id="qrcode" placeholder="Your QRCODE">
                        </form>
                    </div>
                </div>


            </div>
            <?php include 'profile_modal.php'; ?>

        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <?php include_once 'navbar.php'; ?>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        //add
        function triggerClick() {
            document.querySelector('#profileImage').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>



    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById("preview")
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.legth = 1) {
                scanner.start(cameras[0]);
            } else {
                alert('No Cameras Found');
            }
        }).catch(function(e) {
            console.error(e);
        });


        scanner.addListener('scan', function(c) {
            document.getElementById('qrcode').value = c;
            document.forms[0].submit();

        });
    </script>
</body>

</html>