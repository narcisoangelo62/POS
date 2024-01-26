<!DOCTYPE html>
<html lang="en">

<?php
    include('header.php');
?>

<head>
    <title> Login Form Design </title>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
<body>
    <div class="login-box">
    <img src="Sogod.png" class="avatar">

                                <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" 
                                                placeholder="Enter UserName" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                        </div>
                                        
                                        <a href="#" id = "btnLogin" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        
                                    </form>
                                    <script>
var input = document.getElementById("username");
var input2 = document.getElementById("password");
input.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("btnLogin").click();
  }
});
input2.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("btnLogin").click();
  }
});
</script>
                                    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>

<script type="text/javascript">
    $("#btnLogin").click(function(e){
        e.preventDefault();
        var user = $("#username").val();
        var pass = $("#password").val();
        $.ajax({
            type: "POST",
            url: 'processlogin.php',
            data: $(".user").serialize(),
            cache: false,
            success: function(response)
            {
                if (response == "1"){
                    window.location.href = "index.php";
                }else{
                    Swal.fire(
                      'Error',
                      response,
                      'error'
                    )
                }
            }
       });
    })

</script>
<?php
   if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
      <script>
      swal({
      title: "<?php echo $_SESSION['status'];?>",
      icon: "<?php echo $_SESSION['status_code'];?>",
       });
 </script>
 <?php
      unset($_SESSION['status']);
   }
?>