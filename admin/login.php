<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <?php include 'template/head.php'; ?>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <section>
                    <div class="page">
                        <div class="welcome">
                            <h2>Welcome Back! <br/> Shaa Resort</h2>
                            <button class="sign_in">Register</button>
                            <button class="btn">LogIn</button>
                        </div>
						<div class="login">
							<form method="POST">
								<h2>Login your Account</h2>
								<input type="email" name="email" placeholder="Email" required><br>
								<input type="password" name="password" placeholder="Password" required><br>
								<input type="submit" name="sign_in" value="Register" class="in">
							</form>
						</div>
                        <div class="sign_up">
                            <form method="POST" action="signup_user.php">
                                <h2>LogIn Up your Account</h2>
                                <input type="email" name="email" id="email" placeholder="Email" required><br>
                                <input type="password"  name="password" id="password" placeholder="Password" required><br>
                                <input type="button" onclick="login(this.form)" name="sign_up" value="LogIn" class="up mt-3">
                            </form>
                        </div>
                    </div>
                </section>
               
            </div>
        </div>
    </main>
    <?php include 'template/footer.php'; ?>
    <script src="js/app.js"></script>
<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,700');
body
{
	margin: 0;
	padding: 0;
	background: #052a2a;
}
section
{
	position: relative;
	width: 100%;
	height: 100vh;
}
section .page
{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 800px;
	height: 400px;
	background: #fff;
	border-radius: 5px;
	box-shadow: 0px 5px 20px rgba(0,0,0,0.5);
}
section .page .welcome
{
	position: absolute;
	top: 0;
	left: 0;
	width: 300px;
	height: 400px;
	border-top-left-radius:  5px;
	border-bottom-left-radius:  5px;
	background: #000;
	text-align: center;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 2;
}
section .page .welcome h2
{
	text-align: center;
	margin: 50px 0;
	font-family: 'Poppins';
	letter-spacing: 2px;
	color: #fff;
}
section .page .welcome p
{
	padding: 0 25px;
	text-align: center;
	font-family: 'Poppins';
	color: #fff;
	font-weight: 300;
}
section .page .welcome .sign_in
{
	margin: 30px 0;
	width: 150px;
	height: 40px;
	text-align: center;
	border-radius: 30px;
	outline: none;
	border:none;
	background: transparent;
	border:1px solid #fff;
	font-family: 'Poppins';
	color: #fff;
	cursor: pointer;
	opacity: 1;
	visibility: visible;
	transition: .5s;
}
section .page .welcome .btn
{
	position: absolute;
	top: 57.5%;
	left: 25%;
	width: 150px;
	height: 40px;
	text-align: center;
	border-radius: 30px;
	outline: none;
	border:none;
	background: transparent;
	border:1px solid #fff;
	font-family: 'Poppins';
	color: #fff;
	cursor: pointer;
	opacity: 0;
	visibility: hidden;
}
section .page .welcome .btn.active
{
	opacity: 1;
	visibility: visible;
	transition: .5s;
	transition-delay: .5s;
}
section .page .welcome .sign_in.active
{
	opacity: 0;
	visibility: hidden;
	display: none;
	transition: .5s;
	transition-delay: .5s;
}
section .page .sign_up
{
	position: absolute;
	top: 0;
	left: 300px;
	width: 500px;
	height: 100%;
	text-align: center;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 1;
	opacity: 1;
	visibility: visible;
}
section .page .sign_up h2
{
	position: relative;
	margin: 50px 0;
	padding: 0;
	font-family: 'Poppins';
}
section .page .sign_up input
{
	margin: 5px 0;
	width: 300px;
	height: 30px;
	font-family: 'Poppins';
	color: #000;
	font-weight: 700;
}
section .page .sign_up input[type="text"],
section .page .sign_up input[type="email"],
section .page .sign_up input[type="password"]
{
	border:none;
	outline: none;
	border-bottom: 1px solid #000;
	transition: .5s;
}
section .page .sign_up input[type="text"]:focus,
section .page .sign_up input[type="email"]:focus,
section .page .sign_up input[type="password"]:focus
{
	border-bottom-color: #D50000;
	transition: .5s;
}
section .page .sign_up .up
{
	width: 150px;
	height: 40px;
	font-weight: 400;
	border:none;
	outline: none;
	background: #000;
	color: #fff;
	border-radius: 30px;
	transition: .5s;
	cursor: pointer;
}
section .page .sign_up .up:hover
{
	background: transparent;
	border:2px solid #000;
	color: #000;
	font-weight: 700;
}
section .page .welcome.active
{
	background: #000;
	color: #fff;
	left: 62.5%;
	border-top-left-radius: 0px;
	border-bottom-left-radius: 0px;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px; 
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 2;
}
section .page .sign_up.active
{
	left: 0;
	opacity: 0;
	visibility: hidden;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
}
section .page .login
{
	position: absolute;
	top: 0;
	left: 300px;
	width: 500px;
	height: 100%;
	text-align: center;
	opacity: 0;
	visibility: hidden;
}

section .page .login h2
{
	position: relative;
	margin: 50px 0;
	padding: 0;
	font-family: 'Poppins';
}
section .page .login input
{
	margin: 5px 0;
	width: 300px;
	height: 30px;
	font-family: 'Poppins';
	color: #000;
	font-weight: 700;
}
section .page .login input[type="email"],
section .page .login input[type="password"]
{
	border:none;
	outline: none;
	border-bottom: 1px solid #000;
	transition: .5s;
}
section .page .login input[type="email"]:focus,
section .page .login input[type="password"]:focus
{
	border-bottom-color: #2ecc71;
	transition: .5s;
}
section .page .login .in
{
	width: 150px;
	height: 40px;
	font-weight: 400;
	border:none;
	outline: none;
	background: #000;
	color: #fff;
	border-radius: 30px;
	transition: .5s;
	cursor: pointer;
}
section .page .login .in:hover
{
	background: transparent;
	border:2px solid #000;
	color: #000;
	font-weight: 700;
}
section .page .login.active
{
	left: 0;
	opacity: 1;
	visibility: visible;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>