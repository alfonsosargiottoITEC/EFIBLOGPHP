<?php ?>

<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h1 class='generalTitle'>JOIN OUR COMMUNITY </h1>
    </div>
</div>
<div class="row">  </div>

<div class="row">
    <div class="col">
    </div>
    <div class="col-5">
    <div class = "form-group"> 
    <!-- los datos de este formulario, se envían a  'registration.php' gracias al método 'POST' -->
    <form action="registration.php" method="POST">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" id="firstname" name ="firstname" placeholder="your firstname here">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="lastname" class="form-control" id="lastname" name = "lastname" placeholder="your lastname here">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name ="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name = "password" placeholder="**************">
    </div>
    <button class="btn btn-primary" type="submit">Confirm </button>
        <span><?php echo $error; ?></span>
    </form>
</div>
    </div>
    <div class="col">
    </div>
</div>


<?php include('includes/footer.php'); ?>



