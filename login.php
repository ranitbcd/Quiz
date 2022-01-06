
<!DOCTYPE html>
<html lang="en">
<head>
<style>
p{
    background-color:red;
    color:white;
    font-weight:bold;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
<form name="f1" id="f1" method="post" action="check.php">
    <div class="col-md-4">
    <div class="form-group">
    <label for="exampleInputEmail1">User ID</label>
    <input type="text" class="form-control" id="uid" name="uid" aria-describedby="emailHelp" placeholder="Enter User Id">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="pwd" name="pwd" aria-describedby="emailHelp" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <div class="form-group">
  </div>
</form>

</div>
    </div>
</div>

  
</body>
</html>