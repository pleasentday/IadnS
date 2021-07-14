<?php 

	require 'db.php';

	$data = $_POST;
	if ( isset($data['submit']) )
	{
		// registratsiya qilamiz	

		$errors = array();
		// if ( trim($data['surname']) == '') 
		// {
		// 	$errors[] = '';
		// }

		// if ( trim($data['email']) == '') 
		// {
		// 	$errors[] = '';
		// }

		// if ( trim($data['phone']) == '') 
		// {
		// 	$errors[] = 'Email kiriting';
		// }

		// if ($data['password'] == '') 
		// {
		// 	$errors[] = 'Parol kiriting';
		// }

		// if ( trim($data['password_2']) != $data['password']) 
		// {
		// 	$errors[] = "Ikkinchi parol noto'g'ri kiritilgan";
		// }

		if ( R::count('users', "phone = ?", array($data['phone'])) > 0 ) 
		{
			$errors[] = "<html>
<head>
	<meta charset='utf-8'>
	<title>document</title>
	<style>
:root{
--neon: #ce0000;
--bg: hsl(323 21% 16%);
}

*,
*::before,
*::after{
	box-sizing: border-box;
	margin: 0;
}

body{
	min-height: 100vh;
	display: grid;
	place-items:  center;
	background: var(--bg);
	font-family: 'Balsamiq Sans', cursive;
	color: var(--neon);
}

div{
	display: flex;
	flex-direction: column;
	align-items: center;
}
h1, h2{
	font-family: sans-serif;
	color: #fff;
	text-transform: uppercase;
}
h1{
	font-size: 3em;
}
h2{
	padding-bottom: 50px;
}

.btn{
	font-size: 4em;

	display: inline-block;
	cursor: pointer;
	text-decoration: none;
	color: var(--neon);
	border: var(--neon) 0.125em solid;
	padding: 0.25em 1em;
	border-radius: 0.25em;

	text-shadow: 
		0 0 0.125em hsl(0 0% 100% / 0.4),
		0 0 0.45em currentColor;
	box-shadow: inset 0 0 0.5em 0 var(--neon),
				0 0 0.5em 0 var(--neon);

	position: relative;
}

.btn::before{
	pointer-events: none;
	content: '';
	position: absolute;
	background: var(--neon);
	top: 130%;
	left: 0;
 	width: 100%;
 	height: 116%;

 	transform: perspective(0.25em) rotateX(20deg) scale(1, 0.35);

 	filter: blur(2em);
 	opacity: 0.7;
}

.btn::after{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: -0.1em;
	box-shadow: 0 0 2em 0.5em var(--neon);
	opacity: 0 ;
	z-index: -1;
	background-color: var(--neon);
	transition: opacity 100ms linear;
}

.btn:hover,
.btn:focus{
	/*background: var(--neon);*/
	color: #fff;
	text-shadow: none;
}
.btn:hover::before,
.btn:focus::before{
	opacity: 1;
}
.btn:hover::after,
.btn:focus::after{
	opacity: 1;
}
	</style>
</head>
<body>

	<div>
		<h1>Muvaffaqiyatsizlik</h1>
		<h2>Bunday telefon raqami ruyhatdan utgan!</h2>
		<a href='index.html' class='btn'>Orqaga</a>
	</div>

</body>
</html>";
		}

		if ( R::count('users', "email = ?", array($data['email'])) > 0 ) 
		{
			$errors[] = "<html>
<head>
	<meta charset='utf-8'>
	<title>document</title>
	<style>
:root{
--neon: #ce0000;
--bg: hsl(323 21% 16%);
}

*,
*::before,
*::after{
	box-sizing: border-box;
	margin: 0;
}

body{
	min-height: 100vh;
	display: grid;
	place-items:  center;
	background: var(--bg);
	font-family: 'Balsamiq Sans', cursive;
	color: var(--neon);
}

div{
	display: flex;
	flex-direction: column;
	align-items: center;
}
h1, h2{
	font-family: sans-serif;
	color: #fff;
	text-transform: uppercase;
}
h1{
	font-size: 3em;
}
h2{
	padding-bottom: 50px;
}

.btn{
	font-size: 4em;

	display: inline-block;
	cursor: pointer;
	text-decoration: none;
	color: var(--neon);
	border: var(--neon) 0.125em solid;
	padding: 0.25em 1em;
	border-radius: 0.25em;

	text-shadow: 
		0 0 0.125em hsl(0 0% 100% / 0.4),
		0 0 0.45em currentColor;
	box-shadow: inset 0 0 0.5em 0 var(--neon),
				0 0 0.5em 0 var(--neon);

	position: relative;
}

.btn::before{
	pointer-events: none;
	content: '';
	position: absolute;
	background: var(--neon);
	top: 130%;
	left: 0;
 	width: 100%;
 	height: 116%;

 	transform: perspective(0.25em) rotateX(20deg) scale(1, 0.35);

 	filter: blur(2em);
 	opacity: 0.7;
}

.btn::after{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: -0.1em;
	box-shadow: 0 0 2em 0.5em var(--neon);
	opacity: 0 ;
	z-index: -1;
	background-color: var(--neon);
	transition: opacity 100ms linear;
}

.btn:hover,
.btn:focus{
	/*background: var(--neon);*/
	color: #fff;
	text-shadow: none;
}
.btn:hover::before,
.btn:focus::before{
	opacity: 1;
}
.btn:hover::after,
.btn:focus::after{
	opacity: 1;
}
	</style>
</head>
<body>

	<div>
		<h1>Muvaffaqiyatsizlik</h1>
		<h2>Bunday email ruyhatdan utgan!</h2>
		<a href='index.html' class='btn'>Orqaga</a>
	</div>

</body>
</html>";
		}

		if (empty($errors) ) 
		{
			// Xatolar yuq registratsiya qilamiz!
			$user = R::dispense('users');
			$user->surname = $data['surname'];
			$user->name = $data['name'];
			$user->email = $data['email'];
			$user->phone = $data['phone'];
			R::store($user);
			echo "<html>
<head>
	<meta charset='utf-8'>
	<title>document</title>
	<style>
:root{
--neon: #21f8f6;
--bg: hsl(323 21% 16%);
}

*,
*::before,
*::after{
	box-sizing: border-box;
	margin: 0;
}

body{
	min-height: 100vh;
	display: grid;
	place-items:  center;
	background: var(--bg);
	font-family: 'Balsamiq Sans', cursive;
	color: var(--neon);
}

div{
	display: flex;
	flex-direction: column;
	align-items: center;
}
h1, h2{
	font-family: sans-serif;
	color: #fff;
	text-transform: uppercase;
}
h1{
	font-size: 3em;
}
h2{
	padding-bottom: 50px;
}

.btn{
	font-size: 4em;

	display: inline-block;
	cursor: pointer;
	text-decoration: none;
	color: var(--neon);
	border: var(--neon) 0.125em solid;
	padding: 0.25em 1em;
	border-radius: 0.25em;

	text-shadow: 
		0 0 0.125em hsl(0 0% 100% / 0.4),
		0 0 0.45em currentColor;
	box-shadow: inset 0 0 0.5em 0 var(--neon),
				0 0 0.5em 0 var(--neon);

	position: relative;
}

.btn::before{
	pointer-events: none;
	content: '';
	position: absolute;
	background: var(--neon);
	top: 130%;
	left: 0;
 	width: 100%;
 	height: 116%;

 	transform: perspective(0.25em) rotateX(20deg) scale(1, 0.35);

 	filter: blur(2em);
 	opacity: 0.7;
}

.btn::after{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: -0.1em;
	box-shadow: 0 0 2em 0.5em var(--neon);
	opacity: 0 ;
	z-index: -1;
	background-color: var(--neon);
	transition: opacity 100ms linear;
}

.btn:hover,
.btn:focus{
	/*background: var(--neon);*/
	color: var(--bg);
	text-shadow: none;
}
.btn:hover::before,
.btn:focus::before{
	opacity: 1;
}
.btn:hover::after,
.btn:focus::after{
	opacity: 1;
}
	</style>
</head>
<body>

	<div>
		<h1>Muvaffaqqiyat!</h1>
		<h2>Siz ruyhatdan utdingiz</h2>
		<a href='index.html' class='btn'>Orqaga</a>
	</div>

</body>
</html>";
		} else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
 ?>

<!-- 
 <form action="/signup.php" method="post">
 	
 	<p>
 		<p><strong>Login:</strong></p>
 		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
 	</p>

 	<p>
 		<p><strong>Email:</strong></p>
 		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
 	</p>

 	<p>
 		<p><strong>Parol:</strong></p>
 		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
 	</p>

 	<p>
 		<p><strong>Parol ewe raz:</strong></p>
 		<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
 	</p>

 	<p>
 		<button type="submit" name="do_signup">
 			Zaregistrirovatsa
 		</button>
 	</p>
 	<div class="des-1-2" style="width: 100px;height: 50px;color: #fff;background: lightskyblue;display: flex;justify-content: center;align-items: center;border-radius: 5%;">
 		<a href="index1.php" style="text-decoration: none;color: #000;font-weight: 600;">
 			Orqaga
 		</a>
 	</div>

 </form> -->