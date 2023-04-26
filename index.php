<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Google Clone</title>
	<link rel="icon"  href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body {
	display: flex;
	flex-direction: column;
	min-height: 100vh;
	background: no-repeat url('Space.gif');
	background-size:cover;
}
.lang a {
	margin-left:auto;
	margin-right: auto;
	color: #1a0dab;
}
.lang {
	margin-top: 30px;
	text-align: center;
	font-size: 13px;
	color: #ffffff;
}

	</style>
</head>
<body>
      <nav>
      	<a href="#">Gmail</a>
      	<a href="#">Images</a>
      	<img src="img/g-menu.PNG">
      	<button>Sign in</button>
      </nav>
      <section class="section-1">
      	<img src="img/logo.png" class="logo">
      	<form><br><br>
      		<div class="s-box">
      			<img src="img/search.svg" class="search-icon">
      			<input type="text" 
                               id="input" 
                               autocomplete="off"
                               class="s-input">
      			<img src="img/vs.png" class="vs-icon">
      			<input type="submit" 
                               class="s-btn" 
                               value="Google Search">
      			<input type="submit" class="s-btn" value="I'm Feeling Lucky">

                        <ul class="dropdown" id="dropdown"></ul>
      		</div>
      	</form>
      	<div class="lang" style="margin-left:auto;margin-right:auto;">
      		Google offered in:
      		<a href="#">Nederlands</a>
      		<a href="#">Frysk</a>
      		<a href="#">English</a>
      		<a href="#">Filipino</a>


      	</div>
      </section>
      <footer>
      	<div class="links">
      		<div class="link-1">
      			<a href="#">Advertising</a>
      			<a href="#">Business</a>
      			<a href="#">About</a>
      			<a href="#">How Search works</a>
      		</div>
      		<div class="link-2">
      			<a href="#">Privacy</a>
      			<a href="#">Terms</a>
      			<a href="#">Settings</a>
      		</div>
      	</div>
      </footer>
<script src="jquery.min.js"></script>
<script>
      $(document).ready(function(){
          
          function fetchData(){
            var s = $("#input").val();

            if (s == '') {
               $('#dropdown').css('display', 'none');
            }
            $.post("Api/auto_complet.php", 
                  {
                    s:s
                  },
                  function(data, status){
                      if (data != "not found") {
                        $('#dropdown').css('display', 'block');
                        $('#dropdown').html(data);
                      }
                  });
          }
          $('#input').on('input', fetchData);
          $("body").on('click', () => {
            $('#dropdown').css('display', 'none');
          });
          $('#input').on('click', fetchData);
      });
</script>
</body>
</html>