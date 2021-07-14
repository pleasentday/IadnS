<?php 
include "database.php";

$result = mysqli_query($induction,"SELECT * FROM `users`");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vivod iz bazi dannih</title>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: sans-serif;
		}
		html,body{
			width: 100%;
			height: 100vh;
			display: inline-block;
			background-image: url('img/truck.jpg');
			background-attachment: fixed;
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			color: #fff;
		}
		.logo{
			margin: 30px 0;
			width: 100%;
			display: flex;
			justify-content: center;
		}
		.logo img{
			width: 20%;
			border-radius: 50%;
			box-shadow: inset -1px -1px 2px rgba(0, 0, 0, 0.8),
							   2px 2px 5px rgba(0, 0, 0, 0.8);
		}
		.row{
			background-color: rgba(0, 0, 0, 0.7);
			margin: auto;
			height: 100%;
			width: 90%;
			position: relative;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		.des{
			width: 100%;
			height: 10vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		table{
			border: 2px #fff solid;
			width: 90%;
			margin: 50px auto;
		}
		table th, td{
			background-color: rgba(0, 0, 0, 0.2);
			border: 2px #fff solid;
			padding: 10px;
		}


		/*==========
   			Loader 
  		  ==========*/
		.preloader {
			display: flex;
			justify-content: center;
			align-items: center;
		  background: #fff;
		  visibility: visible;
		  opacity: 1;
		  position: absolute;
		  z-index: 9999;
		  height: 100%;
		  width: 100%;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  perspective: 500px;
		}
		.preloader img {
			width: 200px;
			border-radius: 50%;
			box-shadow: inset -1px -1px 2px rgba(0, 0, 0, 0.8),
							   2px 2px 5px rgba(0, 0, 0, 0.8);
		  animation: load 4s infinite linear;
		  transform-style: preserve-3d;
		}
		@keyframes load {
			50% {
				transform: rotateY(180deg);
			}
			100% {
				transform: rotateY(360deg);
			}
		}
		.done {
			transition: 0.8s;
			opacity: 0;
			visibility: hidden;
		}

	</style>
</head>
<body id="body">
<div id="index1">
	<div class="logo">
		<img src="img/logo-I&S.jpg">
	</div>

    <div class="loader">
  
      <div class="preloader" id="preloader">
        <img src="img/logo-I&S.jpg">
      </div>
      
    </div>

	<div class="row">
		<div class="des">
			<h2>Ro'yhatdan o'tganlar</h2>
		</div>
		<table>
			<tr>
				<th>№</th>
				<th>Familya Ismi</th>
				<th>Email</th>
				<th>Telefon raqami</th>
			</tr>
			<?php
				while ($user = mysqli_fetch_assoc($result))
				{	
				?>
				<tr>
					<td><?php echo "$user[id]"; ?></td>
					<td><?php echo "$user[surname] $user[name]"; ?></td>
					<td><?php echo "$user[email]"; ?></td>
					<td><?php echo "$user[phone]"; ?></td>
				</tr>
				<?php
				}

			?>
		</table>
	</div>
</div>
	<script>
	// preloader function
    document.body.onload = function(){
        setTimeout(function(){
            var preloader = document.getElementById('preloader');
            if(!preloader.classList.contains('done'))
            {
                preloader.classList.add('done');
            }
        }, 2000);
    }


	</script>

</body>
</html>