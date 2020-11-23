<?php 

    session_start();
    include "incs/dbc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AYS - <?php 
        if (!$_GET["page"]) {
            echo "Dashboard";
        }else{
            echo $_GET['page'];
        }
    ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php

       if (isset($_POST["logmit"])) {
           
            $username = $_POST["username"];
            $password = $_POST["password"];

            $select = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $sres = mysqli_query($conn, $select);
            if (mysqli_num_rows($sres) > 0) {
                while ($row = mysqli_fetch_assoc($sres)) {
                    $_SESSION["admin"] = $row["name"];
                }
            }
 
       }


        if (!isset($_SESSION["admin"])) {
            include "login.php";
        }else{
            include "dashboard.php";
        }

    ?>

  
        
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="js/main.js"></script>
    <script type="text/javascript">
        
        function getCategories(){

            $.ajax({
                url: "incs/getCategories.php",
                type: "POST",
                success: function(data){
                    $("#categoryData").html(data);
                }
            });

        }

        function showProducts(){

            $.ajax({
                url: "incs/showProducts.php",
                type: "POST",
                success: function(data){
                    $("#showProducts").html(data);
                }
            });

        }

        // function selectSubcategory(){

        //     $.ajax({

        //         url: 'getsubcats.php',
        //         type: 'post',
        //         success: function(response){
        //             $().html(response);
        //         }

        //     });

        // }

        getCategories();
        showProducts();

    </script>

</body>

</html>