<!-- Star Session for Messages -->
<?php session_start(); ?>
<?php
    if($_SESSION['logged'] == false){
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>'First Login','status'=> 'danger');
        //Redirect to login page
        header("location:login.php");
    }
    //Include the conection file
    include 'conection.php';
    //Query to Select all users
    $query = "Select *,c.name as category from products p inner join categories c on p.id_category = c.id_category";
    $result = mysqli_query($conection,$query);

?>
    <html>

    <head>
        <title>Dashboard</title>
        <script src="https://kit.fontawesome.com/9a531d5922.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/admin_styles.css">
    </head>

    <body id='admin'>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="imgs/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="products.php">All Products</a>
                            <a class="dropdown-item" href="create_product.php">Add Products</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="categories.php">All Categories</a>
                            <a class="dropdown-item" href="create_category.php">Add Categories</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="users.php">All Users</a>
                            <a class="dropdown-item" href="create_user.php">Add User</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class='content my-3 mr-auto ml-auto'>
                <!-- Validate if the message var is full and is an array to display the message-->
                <?php  if(isset($_SESSION['message']) && is_array($_SESSION['message'])): ?>
                <div class="alert alert-<?php echo $_SESSION['message']['status']; ?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message']['text']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Finish the validation -->
                <?php endif; ?>
                <!-- Clean the message var to dont display the message again. -->
                <?php unset($_SESSION['message']);?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                    <?php while($column = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo $column['id_product'] ?>
                        </td>
                        <td>
                            <?php echo $column['name'] ?>
                        </td>
                        <td>
                            <?php echo $column['description'] ?>
                        </td>
                        <td>
                            <?php echo $column['price'] ?>
                        </td>
                        <td>
                            <?php echo $column['category'] ?>
                        </td>
                        <td>
                            <img src="../imgs/products/<?php echo $column['image'] ?>" alt="">
                        </td>
                        <td>
                            <?php if($column['status']==1): ?>
                                <i class="fas fa-check-circle"></i>
                            <?php else: ?>
                                <i class="fas fa-times-circle"></i>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </html>