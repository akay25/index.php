<html>
	<head>
		<title>Web server</title>
		<style>
			body{
				background:#3f9fff;
				margin:0px;
				padding: 0px;
				font-family: 'Sans-serif';
			}
			.header{
				text-align:center;
				border: 1px solid #002d7f;
				width: 99.85%;
				font-size: 54px;
				background-color:#005aff;
				color:#fff;
				box-shadow: 1px 1px 5px #888888;
				display:block;
				position:relative;
			}

			.container{
				border: 1px solid #3f9fff;
				background-color:white;
				width:  95%;
				margin: -2px auto;
				border-radius:2px 2px px 2px;
			}

			.footer{
				border-top:1px solid #ffdb99;
				width:98%;
				height: 40px;
				margin: 30px auto;
				text-align:center;
			}
			.f-holder{
				color: #ffdb99;
				font-size: 14px;
			}

			.company{
				font-size: 12px;
				color:white;
			}

			.block{
				width:95%;
				margin:10px auto;
			}

			.link{
				color:#005aff;
				text-decoration:none;
			}

			.link:hover{
				color:#0048cc;
				text-decoration:underline;

			}

			label{
				color:#05a4d2;
				font-size:24px;
			}

			.label{
				color: #291818;
			}

			.ending{
				border-top:1px solid #e3bb8d;
				width: 95%;
				margin:auto;
			}

			ul{
				list-style:none;
			}
		</style>
	</head>

	<body>
		<div class='header'>
			Web server
		</div>

		<div class='container'>

			<div class='block system'>
				<label>
					Server info
				</label>	
				<table>
					<tr>
						<td class='label'>Apache version</td><td>:</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
					</tr>
					<tr>
						<td class='label'>PHP version</td><td>:</td><td><?php echo phpversion(); ?></td>
					</tr>
					<tr>
						<td class='label'>MySQL version</td>
						<td>:</td>
						<td><?php echo str_replace('mysql','',str_replace('Ver 14.14 Distrib ', '', shell_exec('mysql -V'))); ?></td>
					</tr>
					<tr>
						<td class='label'>Modules</td>
						<td>:</td>
						<td>
							<?php
								echo str_replace('[PHP Modules]', '', shell_exec('php5.6 -m'));
							?>						
						</td>
				</table> 
			</div>
			
			<div class='ending'></div>
			
			<div class='block pma'>
				<label>
					Apps
				</label> <br>
				<ul>
					<li><a href='/phpmyadmin/' name='pma' target='_blank' class='link'>phpmyadmin</a></li>
				</ul>
			</div>

			<div class='ending'></div>

			<div class='block projects'>
				<label>Projects</label><br>
				<ul>
				<?php 
					$output = shell_exec('ls -d */');

					$dirs = explode('/', $output);
					array_pop($dirs);

					foreach($dirs as $dir){
						echo "<li><a href='$dir/' class='link'>$dir</a></li>";
					}
				?>
				</ul>
			</div>

			<div class='ending'></div>
		</div>

		<div class='footer'>
			<p class='f-holder'>
				This is an alternative solution to Windows Wamp server index.php for Linux AMP systems.
			</p>

			<p class='f-holder company'>
				A Shivy production.
			</p>
		</div>
	</body>
</html>
