<!-- Star Session for Messages -->
<?php session_start(); ?>
<html>

<head>
    <title>Login Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin_styles.css">
</head>

<body>
    <div class="h-100 container d-flex justify-content-center align-items-center">
        <div class="login">
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
            <img src="imgs/logo.png" alt="">
            <form action='autentication.php' method='POST'>
                <div class="form-group">
                    <label for="inpput_email">Email address</label>
                    <input name="email" type="email" class="form-control" id="inpput_email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inpput_password">Password</label>
                    <input name="password" type="password" class="form-control" id="inpput_password">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="register.php"><button type="button" class="btn btn-success">Register</button></a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>