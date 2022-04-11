
<!DOCTYPE html>
<html lang="en" style="background-image: url('bg.jpg');">
<?php
session_start();
$username=$_SESSION['username'];
?>
	<head>
		<meta charset="utf-8">
		<title>DRS Freshness predictor</title>
		 <link rel="stylesheet" type="text/css" href="jstyle.css" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<style>
			body {
				min-height: 75rem;
				padding-top: 4.5rem;
			}

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    border-color: #1d96e0;
    background-color: #d6d0d1;
   }
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
		</style>
		</head>
	<body style="background-image: url('bg.jpg');">
		 <?php include_once('jheader.php'); ?>

		 <br> <br> <br> <br>
		
		<main role="main" class="container mt-5">
			
			<div class="row">
				<div class="col-6">
					<input id="image-selector" class="form-control border-0" type="file" style="background: transparent; display: none;">

					<label class="custom-file-upload" for="image-selector"> 
					<img src="https://img.icons8.com/ultraviolet/30/000000/full-image.png"/> Image upload </label>
				</div>
				<div class="col-6">
					<button id="predict-button" class="btn btn-success float-right"> <img src="https://img.icons8.com/cotton/40/000000/financial-growth-analysis.png"/> Predict Freshness
					</button>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-6">
					<h2 class="ml-3">Produce Image</h2>
					<img id="selected-image" class="ml-3" width="250" alt=""> 
				</div>
				<div class="col-6">
					<h2 class="ml-3">Predictions</h2>
					<ol id="prediction-list"></ol>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
		<script src="target_classes.js"></script>
		<script src="predict.js"></script > 
	</body>
</html>