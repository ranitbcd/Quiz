<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayWithCS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<title></title>
<style>
        body{
            font-size: smaller;
        }
        .btn-primary float-right{
            margin-top: 20px;
        }
        .top-right{
            flex-direction: row;
            float: right;
            padding: 20px;
        }
        .nav-link{
            padding-right: 0.5rem;
            padding-left: 0.5rem;
        }
        .carousel-inner img {
             width: 1200px;
            height: 400px;
      }
      #a1{
        color:black;
      }
      a{
        color:black;
      }
      </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-success">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" id="a1" >
                    <img src="1.jpg" class="rounded-circle"  width="5%">
                    Play With CS
                </a>
                
            </div>
            
            
            <div class="top-right">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="userlogin.php">LOGIN</a></li>
                    <li class="nav-item"><a class="nav-link" href="userregister.php">REGISTER</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CONTACT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
                   
</li>
</ul>
</div>
</div>
</nav>
<div class="container-fluid">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/c-programming-course.png" alt="Los Angeles" width="auto" height="300">
              </div>
              <div class="carousel-item">
                <img src="images/j.png" alt="Chicago" width="auto" height="300">
              </div>
              <div class="carousel-item">
                <img src="images/node.png" alt="New York" width="auto" height="300">
              </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
          <div class"footer">
          <p> Design By Sayani Chanda 2021<p>

</body>
</html>