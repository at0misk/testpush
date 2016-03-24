<!DOCTYPE html>
<html>
<head>
	<title>Random Word Generator</title>
	<style type="text/css">
	*{
		font-family: helvetica;
	}
		#container{
			margin:0px auto;
			width:800px;
			height:600px;
			text-align: center;
		}
		#attempts{
			width:800px;
			height:100px;
			border:1px solid silver;
			padding-top:50px;
		}
		#main{
			width:800px;
			height:700px;
			border:1px solid silver;
			padding-top:100px;
		}
		input{
			font-size:18px;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="attempts">
		<h2>Random Word (attempt <?php echo $this->session->userdata('counter'); ?>)</h2>
		</div>
		<div id="main">
		<h1><?php echo $this->session->userdata('random'); ?></h1>
		<form method='post' action='/words/process'>
		<input type="submit" value="Generate">
		</form>
		</div>
	</div>
</body>
</html>