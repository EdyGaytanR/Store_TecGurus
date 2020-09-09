<!-- Star Session for Messages -->
<?php session_start(); ?>
<?php
    if($_SESSION['logged'] == false){
        //Create a danger message for the not created user 
        $_SESSION['message'] = array('text'=>'First Login','status'=> 'danger');
        //Redirect to login page
        header("location:login.php");
    }
    include 'conection.php';
    $query = "Select * from categories";
    $result = mysqli_query($conection,$query);
?>
    <html>

    <head>
        <title>Dashboard</title>
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
                            <a class="dropdown-item" href="#">All Products</a>
                            <a class="dropdown-item" href="#">Add Products</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">All Categories</a>
                            <a class="dropdown-item" href="#">Add Categories</a>
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
                <form action="add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input_name">Name</label>
                        <input name="name" type="text" class="form-control" id="inpput_name" aria-describedby="nameHelp">
                    </div>
                    <div class="form-group">
                        <label for="input_description">Description</label>
                        <textarea name="description" class="form-control" id="input_description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_price">Price</label> $
                        <input name="price" type="numbre" class="form-control" id="input_price" aria-describedby="priceHelp">
                    </div>
                    <div class="form-group">
                        <label for="input_category">Category</label>
                        <select name='category' class="form-control" id="input_category">
                            <option value="">Select a Category</option>
                        <?php while($column = mysqli_fetch_array($result)): ?>
                            <option value="<?php echo $column['id_category'] ?>"><?php echo $column['name'] ?></option>
                         <?php endwhile; ?>
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="input_image">Image</label>
                        <input name='image' type="file" class="form-control-file" id="input_image">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </html>