<!DOCTYPE html><?php
if(isset($_POST['code']))
{
  echo '<script>alert("invalid Details!");</script>';
}?>
<head>
  <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/cart.css" type="type/css">
  <link rel="stylesheet" href="css/prod1.css" type="type/css">
  <link rel="stylesheet" href="css/line.css" type="type/css">
  <link rel="stylesheet" href="css/animate.css" type="type/css">
  <link rel="stylesheet" href="css/box1.css" type="type/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="typeahead.min.js"></script>
  <script type="text/javascript">

  </script>
  <style>
  @import url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    .search{
        width: 230px;
        position: relative;
       margin-top:10px;
        font-size: 14px;
    }
.typeahead, .tt-query, .tt-hint {
  border: 2px solid #CCCCCC;
  border-radius: 8px;
  font-size: 16px;
  height: 30px;
  line-height: 30px;
  outline: medium none;
  padding: 8px 12px;
  width: 230px;
}
.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #0097CF;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #999999;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 422px;
}
.tt-suggestion {
  font-size: 24px;
  line-height: 24px;
  padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
    body {
  margin: 0;
  padding: 0;
  background: #ccc;
}
 
.nav ul {
  list-style: none;
  background-color: #444;
  text-align: center;
  padding: 0;
  margin: 0;
}
.nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  height: 40px;
  border-bottom: 1px solid #888;
}
 
.nav a {
  text-decoration: none;
  color: #fff;
  display: block;
  transition: .3s background-color;
}
 
.nav a:hover {
  background-color: #005f5f;
}
 
.nav a.active {
  background-color: #fff;
  color: #444;
  cursor: default;
}
 
@media screen and (min-width: 600px) {}
  .nav li {
    width: 120px;
    border-bottom: none;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
  }
 
  /* Option 1 - Display Inline */
  .nav li {
    display: inline-block;
    margin-right: -4px;
  }
 
  /* Options 2 - Float
  .nav li {
    float: left;
  }
  .nav ul {
    overflow: auto;
    width: 600px;
    margin: 0 auto;
  }
  .nav {
    background-color: #444;
  }
  */

  * {
  box-sizing: border-box;
}
select {
    border:transparent;
    background-color: transparent;
  color:  #FFFFFF;
  font-size:20px;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
.example  {
  float: left;
  width: 35%;
  padding: 10px;
  height:4%;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

.example :hover {
  background: #0b7dda;
}

/* Clear floats */
.example::after {
  content: "";
  clear: both;
  display: table;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 300px;
  padding: 10px;
  height:300px;
  padding-bottom:10px;
  background: #2196F3;
  color: white;
  font-size: 13px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (min-width: 600px) {

  }
</style>
</head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
<LINK REL=StyleSheet HREF="css/style.css" TYPE="text/css" MEDIA=screen>
<meta name="robots" content="noindex,follow" />
<body>
  <div class="container">
    <div class="login" style="margin-top:200px">
      <h1>Login to Admin Panel</h1>
      <form method="POST" action="connect_login.php">
        <p><input type="text" name="login"  placeholder="Username" required></p>
        <p><input type="password" name="password" placeholder="Password" required></p>
        <center><input type="submit" name="commit" style="margin-left:-1095px"></center>
      </form>
    </div>
  </div>
</body>
</html>