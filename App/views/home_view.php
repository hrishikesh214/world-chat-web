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
			background-image: linear-gradient(to right, #2ad1cc , #18f079);
			background-color: #2ad1cc;
			/*background-color: rgba(1, 1, 1, 0.3);*/
			position: absolute;
			bottom: 0%;
			width: 100vw;
			height: 10vh;
			display: flex;
		}
		.fmb{
			position: relative;
			left:25vh;
			align-self: center;
		}
		.msgbar{
			background-color: rgba(0, 0, 0, 0.1);
			height: 5vh;
			width: 70vw;
			border-width: 2px;
			border-color: black;
			padding: 5px 5px 5px 5px;
			font-style: serif;
			font-family: verdana;
			border-radius: 5px 5px 5px 5px;
			border-radius: 5px 5px 5px 5px;
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
		}
		.navbar{
			background-image: linear-gradient(to right, #2ad1cc , #18f079);
			background-color: #2ad1cc;
			height: 10vh;
			width: 100vw;
			display: flex;
			flex-direction: row-reverse;
			align-content: center;
		}
		.ele{
			/*height: 100%;*/
			align-self: center;
			width: auto;
			font-family: verdana;
			font-size: 1.5rem;
			margin: 5px 5px 5px 5px;
			cursor: pointer;
			padding-top: 3vh; 
			margin-right: 3vw;
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
			width: 95%;
			height: 95%;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			/*background-color: rgba(1, 1, 1, 0.4);*/
		}
		.hmb:hover{
			cursor: pointer;
		}
	</style>
	
	<div class="navbar">
		<div class="hmb">
    		<div class="ele" onclick="javascript:login()">Login</div>
    	</div>
    	<div class="hmb">
    		<div class="ele" onclick="javascript:logout()">Logout</div>
    	</div>
	</div>
	<div class="container">
		<div class="inner-container">

		</div>
	</div>
    <div class="foot-msgbar">
    	<div class="fmb">
    		<input type="text" name="msg" class="msgbar" placeholder="type message here">
	    	<button class="send-btn" onclick="javascript:send()">Send</button>
    	</div>
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
    		$.post("<?=base_url('Home/send')?>", {
    			msg:m, 
    			username: "<?=$user['username']?>",
    			avatar_url: "<?=$user['avatar_url']?>"
    		});
    	}
    	
    </script>
</body>
</html>