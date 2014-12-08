<?php
	$xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Online CV about experiences, skills, education, and many things related to informatics and Network Administrator">
	<meta name="keywords" content="<?php echo $xml->datadiri->nama.", ";echo $xml->experiences->experience->nama.", ";echo $xml->background->study->nama; ?>">
	<meta name="author" content="<?php echo $xml->datadiri->nama; ?>">	

    <title><?php echo $xml->datadiri->nama; ?> - Curriculum Vitae</title>
	<link href='<?php echo $xml->website->favicon; ?>' rel='icon' type='image/x-icon'/>
	
	<!-- Hand made css -->
	<link href="css/custom.css" rel="stylesheet">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body style="margin-bottom:15px;">
	<div style="width:55%;margin: 0px auto;">
		<div class="row">
			<h2><?php echo $xml->datadiri->nama; ?></h2>
		</div>
		<div class="row">
			<p style="text-align:right">
				<?php 
				foreach($xml->datadiri[0] as $datadiri){
					echo $datadiri."<br/>";
				}
				?>
			</p>

		</div>
		<div class="row">
			<h3 style="background-color:black;color:white;text-align:center">
				EXPERIENCES
			</h3>		
		</div>
		<?php
			foreach($xml->experiences->experience as $experience){
		?>
		<div class="row">
			<div class="col-md-6">
				<h3><?php echo $experience->nama; ?></h3>
					<?php
					 foreach($experience->tempat as $tempat){
						echo $tempat."<br/>";
					}
					?>
					<?php echo $experience->periode; ?><br/>
			</div>
			<div class="col-md-6">
				<h3>&nbsp;</h3>
				<ol>
					<?php
					 foreach($experience->keterangan as $keterangan){
						echo "<li>".$keterangan."</li>";
					}
					?>
				</ol>
			</div>
		</div>
		<?php
			}
		?>
		<div class="row">
			<h3 style="background-color:black;color:white;text-align:center">
				BACKGROUND(s)
			</h3>		
		</div>
		<?php
			foreach($xml->background[0] as $background){
		?>
		<div class="row">
			<div class="col-md-6">
				<h3><?php echo $background->nama; ?></h3>
				<?php 
					foreach ($background->tempat as $tempat) {
						echo $tempat."<br/>";
					}
				?>
				<?php echo $background->periode; ?><br/>
			</div>
		</div>
		<?php
			}
		?>
		<div class="row">
			<h3 style="background-color:black;color:white;text-align:center">
				SKILL(S)
			</h3>
			<div class="row">
				<ol>
					<?php
						foreach ($xml->skills->skill as $skill) {
							echo "<li>".$skill."</li>";
						}
					?>
				</ol>
			</div>			
		</div>

		<?php
			if($xml->books){
		?>
		<div class="row">
			<h3 style="background-color:black;color:white;text-align:center">
				BOOK(s)
			</h3>		
		</div>
		<?php
			foreach($xml->books->book as $book){
		?>
		<div class="row">
			<div class="col-md-6">
				<h3><?php echo $book->judul; ?></h3>
				<?php echo $book->ISBN; ?><br/>
				<?php echo $book->penerbit; ?><br/>
				<?php echo $book->tahun; ?><br/>
			</div>
			<div class="col-md-6">
				<h3>&nbsp;</h3>
				<ol>
					<?php
					 foreach($book->sinopsis as $sinopsis){
						echo "<p>".$sinopsis."</p>";
					}
					?>
				</ol>
			</div>
		</div>
		<?php
			}
		}
		?>
		<div class="row">
			<h5 style="background-color:black;color:white;text-align:center;">
				Copyright <a href="https://github.com/adwisatya/">@adwisatya</a><br/>
				<i>free to use & be distributed</i>
			</h5>
		</div>
	</div>
  </body>
</html>