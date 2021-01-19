
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Worldchat</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
	<style type="text/css">
		body, html{
			padding: 0 0 0 0;
			margin: 0 0 0 0;
		}
		.foot-msgbar{
			background-image: linear-gradient(45deg, #1ddef0 , #1ff09d);
			background-color: #2ad1cc;
			/*background-color: rgba(1, 1, 1, 0.3);*/
			position: absolute;
			bottom: 0%;
			width: 100vw;
			height: 10vh;
			display: flex;
			animation: changetc 10s infinite linear;
		}
		.fmb{
			position: relative;
			left:15vw;
			align-self: center;
		}
		.msgbar{
			background-color: transparent;
			color: black;
			height: 5vh;
			width: 70vw;
			border-width: 2px;
			border-color: black;
			padding: 5px 5px 5px 5px;
			font-style: serif;
			font-family: verdana;
			border-radius: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
			font-size: 1.3rem;
		}
		.send-btn{
			background-color: transparent;
			border-width: 2px;
			border-color: black;
			font-family: verdana;
			font-weight: bold;
			color: black;
			height: 5vh;
			margin-left: 5px;
			padding: 5px 5px 5px 5px;
			font-size: 15px;
			border-radius: 5px 5px 5px 5px;
			cursor: pointer;
			font-size: 1.2rem;
		}
		.navbar{
			/*background-image: linear-gradient(to right, #2ad1cc , #18f079);*/
			background-color: black;
			height: 10vh;
			width: 100vw;
			display: flex;
			
		}
		.hmb{
			align-self: center;
			margin-left: 2vw;
			margin-right: 2vw;
			padding-left: 2vw;
		}
		.ele{
			bottom: 0;
			position: relative;
			width: auto;
			display: inline;
			font-family: verdana;
			font-size: 1.5rem;
		}
		.heading{
			font-weight: bold;
			font-size: 2rem;
			margin-right: 10vw;
			background-color: transparent;
			text-decoration: overline;
		}
		.hele{
			color: transparent;
			text-decoration: overline;
			display: inline;
			width: 100%;
			height: 100%;
			background-color: red;
			background-image: linear-gradient(90deg, #e63d05, #a6f01d);
			background-size: 100%;
			background-repeat: repeat;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent; 
			-moz-background-clip: text;
			-moz-text-fill-color: transparent;
			animation: changetc 7s infinite linear;

		}
		@keyframes changetc{
			0%{
				background-size: 100%;
			}
			25%{
				background-size: 200%;
			}
			50%{
				background-size: 400%;
			}
			75%{
				background-size: 200%;
			}
			100%{
				background-size: 100%;
			}
		}

		.container{
			width: 95vw;
			height: 75vh;
			/*background-color: rgba(1, 1, 1, 0.4);*/
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
		}
		.inner-container{
			width: 98%;
			height: 95%;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			/*background-color: rgba(1, 1, 1, 0.4);*/
		}
		.link{
			cursor: pointer;
			background-color: transparent;
			font-size: 1rem;
			position: relative;
			border: 2px white solid;
			border-radius: 5px;
			color: white; 
			padding: 6px 6px 6px 6px;

		}
		@media only screen and (max-width: 480px){
			.fmb{
				left:0%;
				padding: 5px 5px 5px 5px;
				display: flex;
				flex-direction: row;
				align-items: center;
			}
			.msgbar{
				width:75vw;
				height: 5vh;
				font-size: 1rem;
			}
			.send-btn{
				height: 5vh;
			}
		}
	</style>
	
	<div class="navbar">
		<div class="hmb">
			<div class="heading ele">
				<div class="hele">World Chat</div>
			</div>
			<?php if(!$_SESSION['login']): ?>
				<div class="link ele" onclick="javascript:login()">Login</div>
			<?php endif ?>
			<?php if($_SESSION['login']): ?>
				<div class="ele link" onclick="javascript:logout()">Logout</div>
			<?php endif ?>
		</div>
	</div>
	<div class="container">
		<div class="inner-container">
			<?php //debug($_SESSION);?>
		</div>
	</div>
	<div class="foot-msgbar">
		<?php if($_SESSION['login']): ?> 
			<div class="fmb">
				<input type="text" name="msg" class="msgbar" placeholder="type message here">
				<button class="send-btn" onclick="javascript:send()">Send</button>
			</div>
		<?php endif ?>
	</div>
	<script type="text/javascript">

		const login = () => {
			window.location = "<?=base_url('Home/login')?>";
		}
		const logout = () => {
			window.location = "<?=base_url('Home/logout')?>";
		}

		const send = function(){
			let m = $(".msgbar").val();
			$(".msgbar").val('');
			<?php if($_SESSION['login']): ?>
				$.post("<?=base_url('Home/send')?>", {
					msg:m, 
					username: "<?=$user['username']?>",
					avatar_url: "<?=$user['avatar_url']?>"
				});

			<?php endif ?>
		}

		$('.msgbar').keypress(function(event){
			if(event.code == 'Enter'){ send(); }
		});

	</script>
</body>
</html>