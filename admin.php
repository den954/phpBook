<?
include('connect.php');
?>

<html>
<head>
<title> Books PHP </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="js/jquery.js"></script>


<style type="text/css">
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
} 
</style>


<script>
$(document).ready(function() {
  $('#auth_form').submit(function(){
    $.post("blocks/auth.php", $("#auth_form").serialize(),  
    function(response) {
      document.getElementById("resp").innerHTML=response;
    });
    return false;
  });
});
</script>

</head>
<body >








<div class="container">
<div class="row">
<div class="col-6 col-md-4"> </div>

<div class="col-6 col-md-4">
<main class="form-signin">
  <form id='auth_form'>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name='login' type="email" class="form-control" id="floatingInput" placeholder="Логин" required>
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input name='password' type="password" class="form-control" id="floatingPassword" placeholder="Пароль" required>
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted"> <div id='resp'> 12.07.2021 </div> </p>
  </form>
</main>
</div>

<div class="col-6 col-md-4"> </div>
</div>
</div>


    
  








  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
  crossorigin="anonymous"></script>


</body>
</html>