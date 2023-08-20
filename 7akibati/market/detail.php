<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
?>
<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <img src="img/Shape_86.png" style="width: 200px; margin-left: 30px;">
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for products">
                        <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-mine" type="submit">
                                <i class="fa fa-search"></i>
                                </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse hide navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <?php include '../backends/get_category.php' ?>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                    <img src="img/Shape_86.png" style="width: 200px; margin-left: 30px;">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


  


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <?php include '../backends/get_article_img.php';?>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">
                <?php
                    if (isset($_GET['id'])) {
                        $edit_product_id = $_GET['id'];
                        
                        // Include the database connection
                        include '../backends/db_conection.php';

                        $query = "SELECT nom_ar FROM Article WHERE id_produit = '$edit_product_id'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['nom_ar'];
                            }
                        } else {
                            echo "No results found.";
                        }

                        $conn->close();
                    }
                ?>
                </h3>
                
                <h3 class="font-weight-semi-bold mb-4">
                <?php
                    if (isset($_GET['id'])) {
                        $edit_product_id = $_GET['id'];
                        
                        // Include the database connection
                        include '../backends/db_conection.php';

                        $query = "SELECT prix FROM Article WHERE id_produit = '$edit_product_id'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['prix'];
                            }
                        } else {
                            echo "out of stock";
                        }

                        $conn->close();
                    }
                ?> DA
                </h3>
                <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                <div class="mb-4">
    <form method="POST" action="../backends/commende.php?id=<?php echo $_GET['id']; ?>">
        <div class="row">
            <div class="col-md-6 form-group">
                <label>First Name</label>
                <input name="first_name" class="form-control" type="text">
            </div>
            <div class="col-md-6 form-group">
                <label>Last Name</label>
                <input name="last_name" class="form-control" type="text">
            </div>

            <div class="col-md-6 form-group">
                <label>Mobile No</label>
                <input name="num" class="form-control" type="text">
            </div>

            <div class="col-md-6 form-group">
                <label>Wilaya</label>
                <select name="wilaya" class="custom-select" name="wilaya" required onchange="srcChange(this.value)">
                                    <option value = ""></option>
                                    <option value = "1">Adrar</option>
                                    <option value = "2">Chlef</option>
                                    <option value = "3">Laghouat</option>
                                    <option value = "4">Oum El Bouaghi</option>
                                    <option value = "5">Batna</option>
                                    <option value = "6">Bejaia</option>
                                    <option value = "7">Biskra</option>
                                    <option value = "8">Bechar</option>
                                    <option value = "9">Blida</option>
                                    <option value = "10">Bouira</option>
                                    <option value = "11">Tamanrasset</option>
                                    <option value = "12">Tebessa</option>
                                    <option value = "13">Tlemcen</option>
                                    <option value = "14">Tiaret</option>
                                    <option value = "15">Tizi Ouzou</option>
                                    <option value = "16">Alger</option>
                                    <option value = "17">Djelfa</option>
                                    <option value = "18">Jijel</option>
                                    <option value = "19">Setif</option>
                                    <option value = "20">Saida</option>
                                    <option value = "21">Skikda</option>
                                    <option value = "22">Sidi Bel Abbes</option>
                                    <option value = "23">Annaba</option>
                                    <option value = "24">Guelma</option>
                                    <option value = "25">Constantine</option>
                                    <option value = "26">Medea</option>
                                    <option value = "27">Mostaganem</option>
                                    <option value = "28">MSila</option>
                                    <option value = "29">Mascara</option>
                                    <option value = "30">Ouargla</option>
                                    <option value = "31">Oran</option>
                                    <option value = "32">El Bayadh</option>
                                    <option value = "33">Illizi</option>
                                    <option value = "34">Bordj Bou Arreridj</option>
                                    <option value = "35">Boumerdes</option>
                                    <option value = "36">El Tarf</option>
                                    <option value = "37">Tindouf</option>
                                    <option value = "38">Tissemsilt</option>
                                    <option value = "39">El Oued</option>
                                    <option value = "40">Khenchela</option>
                                    <option value = "41">Souk Ahras</option>
                                    <option value = "42">Tipaza</option>
                                    <option value = "43">Mila</option>
                                    <option value = "44">Ain Defla</option>
                                    <option value = "45">Naama</option>
                                    <option value = "46">Ain Temouchent</option>
                                    <option value = "47">Ghardaia</option>
                                    <option value = "48">Relizane</option>
                                </select>
            </div>
            <div class="col-md-6 form-group">
                <label>Address</label>
                <input name="adress" class="form-control" type="text">
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input name="number" type="number" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-3">
                    <i class="fa fa-shopping-cart mr-1"></i>Buy it now
                </button>
            </div>
            <div id="response-message" class="mt-3">
                        <?php

                        // Check if the session variable is set and display the message
                        if (isset($_SESSION['success_message'])) {
                            echo $_SESSION['success_message'];
                            // Unset the session variable to clear the message
                            unset($_SESSION['success_message']);
                        }
                        ?>
                    </div>
        </div>
    </form>
                    
</div>

                    
                </div>
                
            </div>
            
        </div>  
                      
                
                
                
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>
                        <?php
                    if (isset($_GET['id'])) {
                        $edit_product_id = $_GET['id'];
                        
                        // Include the database connection
                        include '../backends/db_conection.php';

                        $query = "SELECT description FROM Article WHERE id_produit = '$edit_product_id'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $row['description'];
                            }
                        } else {
                            echo "No discription ";
                        }

                        $conn->close();
                    }
                ?>
                        </p>
                    </div>
                    
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="row px-xl-5 pb-3">

                    <?php 
                        include '../backends/db_conection.php';
                        if (isset($_GET['id'])) {
                            $product_id = $_GET['id'];

                        $query = "SELECT
                        a.id_produit,
                        a.nom_ar AS product_name,
                        a.prix AS product_price,
                        a.quantite AS product_quantity,
                        a.main_pic AS main_pic
                        FROM Article a
                        WHERE a.id_produit != '$product_id' AND a.quantite > 0;";
                        $result = $conn->query($query);
                        $counter = 0; // Initialize the counter

                        if ($result->num_rows > 0) {

                            while ( $counter < 4 && $row = $result->fetch_assoc()  ) { 

                                echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">';
                                echo '<div class="card product-item border-0 mb-4">';
                                    echo '<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">';
                                        echo '<a href="detail.php?id=' . $row['id_produit'] . '"><img class="img-fluid w-100" style="width: 400px; height: 300px;" src="' . $row['main_pic'] . '" alt=""></a>';
                                    echo '</div>';
                                    echo '<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">';
                                        echo '<h6 class="text-truncate mb-3">' . $row['product_name'] . '</h6>';
                                        echo '<div class="d-flex justify-content-center">';
                                            echo '<h6>' . $row['product_price'] . ' DA</h6>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<div class="card-footer d-flex justify-content-center align-items-center bg-light border">';
                                        echo '<a href="detail.php?id=' . $row['id_produit'] . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-mine mr-1"></i>View Detail</a>';
                                    echo '</div>';

                                echo '</div>';
                                echo '</div>';
                                $counter++; // Increment the counter

                            }
                        } else {
                            echo 'No products found.';
                        }}

                        $conn->close();                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row m-xl-n1  pt-5 ">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <div class="col-lg-3 d-none d-lg-block" style="top: -20px;">
                    <a href="" class="text-decoration-none">
                        <img src="img/Shape_86.png " style="width: 200px; margin-left: 30px; top: 20px; ">
                    </a>
                </div>
                
                <p>Defining Fashion, Defining Quality </p>                
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5" style="margin-left: 140px;">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-5 style=" style="margin-left: 100px; margin-top:50px;">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Larbaa, Blida</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>7akibati@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0559382831</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">7akibati</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">php Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>