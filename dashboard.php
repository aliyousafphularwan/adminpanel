  <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 

            include "incs/sidebar.php";

            if (isset($_GET["page"])) {
                $page = $_GET["page"];
                include "incs/$page.php";
            }else{
                include "incs/home.php";
            }

        ?>