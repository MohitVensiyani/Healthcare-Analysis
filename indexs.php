<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;

    margin:auto;
    display: inline-block;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  .p{
    display: inline-block;
    padding-left: 10%
  }
  .inner{
    padding-left: 28%;
  }
  .right{
    float: right;

    list-style: none;
  }

  ul {
    display: inline-block;
  }

  </style>


</head>
<body>
<div class="container">

</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact us</a>
    </li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
      <a class="nav-link" href="#">login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">sign up</a>
    </li>
  </ul>
</nav>
<br>

<div row>
  <br><br><br><br><br>

    <div class="col-md-4  p" >


      <div class="card">
        <div class="inner">

        <a href="upload.php">
        <img src="https://elementstark.com/woocommerce-extension-demos/wp-content/uploads/sites/2/2016/12/upload.png" alt="Avatar" style="width:40%">
        </a>
          <h4><b>Upload</b></h4>
          <p>Only csv files</p>

        </div>

      </div>

    </div>


    <div class="col-md-4 p">

      <div class="card">
        <div class="inner">


        <img src="https://www.tsncommunications.com/secure/wp-content/uploads/2015/03/Data-analysis-image-for-blip.jpg" alt="Avatar" style="width:40%">

          <h4><b>Analysis</b></h4>
          <p>view using charts</p>

          </div>

      </div>

    </div>
</div>
</div>

</body>
</html>
