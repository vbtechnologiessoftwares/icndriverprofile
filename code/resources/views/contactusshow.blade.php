<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header" style="background-color: #ffff;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <img src="{{ asset('image/imageedit_2_6154389925.png') }}">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('contactusindex') }}">Contact Us</a></li> 

       <li class="active"><a href="{{ route('auto.index') }}">Auto Insurance</a></li>
        <li class="active"><a href="{{ route('helth.index') }}">Heth Insurance</a></li>
        <li class="active"><a class="btn btn-info" href="{{ route('logout') }}">logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid">

  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs">
   <img src="{{ asset('image/imageedit_2_6154389925.png') }}">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="{{ route('contactusindex') }}">Contact Us</a></li> 

         <li class="active"><a href="{{ route('auto.index') }}">Auto Insurance</a></li>
        <li class="active"><a href="{{ route('helth.index') }}">Heth Insurance</a></li>
        <li class="active"><a class="btn btn-info" href="{{ route('logout') }}">logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-10">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Contacts Us</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contactusindex') }}"> Back</a>
            </div>
        </div>
    </div>
   



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $Contactusshow->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $Contactusshow->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject:</strong>
                {{ $Contactusshow->subject }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Message:</strong>
                {{ $Contactusshow->message }}
            </div>
        </div>
      
    </div>
    </div>
  </div>
</div>

</body>
</html>
