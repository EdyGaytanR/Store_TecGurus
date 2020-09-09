<?php
    //Include the conection file
    include 'admin/conection.php';
    //Query to Select all categories
    $query_categories = "SELECT c.name,COUNT(*) as number FROM categories c INNER JOIN products p ON c.id_category = p.id_category GROUP BY c.id_category";
    $result_categories = mysqli_query($conection,$query_categories);
    //Query to Select all products
    $query_products = "Select p.name as name,p.description,p.price,p.discount,c.name as category,p.image  from products p inner join categories c on p.id_category = c.id_category";
    $result_products = mysqli_query($conection,$query_products);


?>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imgs/favicon1.ico" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a531d5922.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="imgs/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.html">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.html">Contacto</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href=""><i class="fas fa-shopping-cart"></i> <span class="badge badge-danger badge-pill">5</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-content">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imgs/banner_1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="imgs/banner_2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="imgs/banner_3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container-fluid">
            <div class="row my-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-3 categorias">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" data-filter="*">
                            All
                            <span class="badge badge-primary badge-pill">12</span>
                        </li>
                        <?php while($category = mysqli_fetch_array($result_categories)): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-filter=".<?php echo $category['name'] ?>">
                            <?php echo $category['name'] ?>
                            <span class="badge badge-primary badge-pill"><?php echo $category['number'] ?></span>
                        </li> 
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 mb-3 productos">
                    <div class="row">
                        <?php while($product = mysqli_fetch_array($result_products)):  ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3 producto <?php echo $product['category'] ?>">
                            <a href="">
                                <div class="card">
                                    <img src="imgs/products/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">$<?php echo $product['price'] ?> <?php if($product['discount'] != ''){ ?> <span class="price_off"><?php echo $product['discount'] ?>% OFF</span> <?php } ?></h5>
                                        <p class="card-text"><?php echo $product['name'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 linea">
                    <div class="informacion">
                        <img src="imgs/payment.svg" alt="">
                        <p class="titulo">Paga con tarjeta o en efectivo</p>
                        <p class="subtitulo">Con Mercado Pago, tienes meses sin intereses con tarjeta o efectivo en puntos de pago. ¡Y siempre es seguro!</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 linea">
                    <div class="informacion">
                        <img src="imgs/shipping.svg" alt="">
                        <p class="titulo">Envío gratis desde $ 499</p>
                        <p class="subtitulo">Con solo estar registrado en Mercado Libre, tienes envíos gratis en millones de productos seleccionados.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 no-linea">
                    <div class="informacion">
                        <img src="imgs/protected.svg" alt="">
                        <p class="titulo">Seguridad, de principio a fin</p>
                        <p class="subtitulo">¿No te gusta? ¡Devuélvelo! En Mercado Libre, no hay nada que no puedas hacer, porque estás siempre protegido.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    // init Isotope
    var $grid = $('.productos .row').isotope({
        itemSelector: '.producto'
    });
    // filter items on button click
    $('.list-group-item').on('click', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
        //$(".productos")[0].scrollIntoView()
    });
</script>

</html>