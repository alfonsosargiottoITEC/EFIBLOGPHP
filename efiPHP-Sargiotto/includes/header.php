<?php include('includes/getcategories.php'); ?>
<?php $user = $_SESSION['user'];
header("Content-Type: text/html;charset=UTF-8");
 ?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="chrome">
        <link rel = "stylesheet" href = "styles/mystyles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>EFI BLOG PHP </title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" >
            <a class="navbar-brand" style="color: #FFF8DC"  href="index.php">EFI BLOG</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="home.php" style='color: #FFF8DC'  >HOME</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='color: #FFF8DC' role = 'button' role = 'menu'>Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php foreach ($resultCate as $category) : ?>
                        <a class="dropdown-item" href="section.php?idCategoria=<?php echo ($category["idCategoria"]); ?> "><?php echo ($category["nombreCategoria"]); ?></a>
                        <?php endforeach; ?>
                    </div>
                </li> 
            <a class="nav-item nav-link" href="aboutus.php" style='color: #FFF8DC' >About us</a>   
                </div>
            </div>

            <form class="form-inline my-2 my-lg-0">
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                    <a class="nav-item nav-link" href="profile.php" style='color: #FFF8DC' >Profile</a>
                    <a class="nav-item nav-link" href="logout.php" style='color: #FFF8DC' >Log Out</a>
                <?php } else { ?>
                    <a class="nav-item nav-link" href="login.php" style='color: #FFF8DC' >Log In</a>
                    <a class="nav-item nav-link" href="register.php" style='color: #FFF8DC' >Sign up</a>
                <?php } ?>    
                
            </form>

        </nav>
        <div id="container">