
<?php include ("db_connect.php") ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Pawtastic</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="keywords" content="pawtastic, pets, care" />
		<meta name="description" content="Expert care for your furry, feathery or scaley friends" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<link rel="icon" type="image/png" href="img/icon.png">

	</head>
	<body>

		<div id="stage">

			<a class="logo" href="#"><img src="img/logo.png"></img></a>

			<div class="col-md-5 ml-auto">
			
			<nav class="navbar navbar-expand-lg navbar-light">
		  
			  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarPawtastic" aria-controls="navbarPawtastic" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarPawtastic">
			    <ul class="navbar-nav">
			      
			      <li class="nav-item">
			        <a class="nav-link" href="#">About us</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Reviews</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Services</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Sign up</a>
			      </li>	      
			    </ul>
			  </div>

			</nav>

				<div id="stage-caption">
					<h1 class="text-light">We care for your furry little loved ones while you're away</h1>
					<a href="signup.html" class="btn btn-light">Sign up</a>
				</div>
			</div>

			<p class="text-light">Ozzie in Brooklyn</p>

		</div>

		<section id="feature-one">
			<div class="container">
				<div class="feature-content">
					<div class="row align-items-center justify-content-around">					
						<div class="col-lg-5">

							<h1>Expert care for your furry, feathery, or scaley friend</h1>
							<p>We know how stressful it is to leave your pets at home alone. We’re a team of experienced animal caregivers, well connected to local veterinarians. Trust to us to love them like our own, and to keep them safe and happy till you’re home.</p>
							<a href="" class="btn btn-dark">Sign up</a>

						</div>
						<div class="col-lg-5">

							<div class="row">
								<div class="col-6 pet">
									<img src="img/Muffin.png" class="" alt="Muffin">
								</div>
								<div class="col-6 pet">
									<img src="img/Peep.png" class="" alt="Peep">
								</div>
							</div>
							<div class="row">
								<div class="col-6 pet">
									<img src="img/Natasha.png" class="" alt="Natasha">
								</div>
								<div class="col-6 pet">
									<img src="img/Marlon.png" class="" alt="Marlon">
								</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="feature-two">
			<div class="feature-content">
				<div class="row align-items-center justify-content-around">	
					<div class="col-md-6">
						<img src="img/Ollie-and-Maggie.png" class="" alt="Ollie and Maggie">
					</div>

					<div class="col-md-6">
						<div class="container">
							<div class="row align-items-center justify-content-around">
								<div class ="col-lg-8">
									<h1>Services tailored to your needs</h1>
									<p>Schedule one-off or recurring home visits. An experienced member of our team will spend time with your pet, feed them, change cat litter trays, take the dog for a walk, and anything else you need.</p>
									<a href="signup.html" class="btn btn-dark">Sign up</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="feature-three">
			<div class="container">
				<div class="feature-content">
					<div class="row align-items-center justify-content-around">					
						<div class="col-lg-12">
							<h1 class="text-light text-center">Pets and their humans love us</h1>

							<div class="row align-items-center justify-content-around">
																	
								<?php

								 $sql = "SELECT * FROM pets ORDER by id ASC";
								 $result = mysqli_query($conn, $sql);
								 while ($post=$result->fetch_assoc()): ?>

								 <div class="col-lg-5 pet-info">

									 <div class="container">
										<div class="row name">
											<div class="col-3">															
												<img src="uploads/<?php echo $post['file'];?>" alt="..." class="rounded-circle" />
											</div>
											<div class="col-4">
												<p><?= $post['dateposted'] ?></p>
												<h4><?= $post['name'] ?></h4>
											</div>
										</div>
										<div class="card">
											<table class="table table-bordered text-center">
											    <tbody>
												    <tr>											      
												      <td class="col-sm-3">
												      	<div class="small-icon rounded-circle d-flex align-items-center justify-content-around">

														<?php if( $post['gender'] == 'female' ) 
												           echo '<img src="img/female.png" alt="...">';
												        else 
												           echo '<img src="img/icons8-male-50.png" alt="...">';
														?>
														 
														</div>
														<h6><?= $post['gender'] ?></h6></td>
												      <td class="col-sm-3"><h5><?php

												    	$birthday = $post['birthday'];
												    	echo $age = date("Y") - date("Y", strtotime($birthday));

												       ?></h5><h6>Years old</h6></td>
												      <td class="col-sm-3">
												      	<div class="small-icon rounded-circle d-flex align-items-center justify-content-around">
												      	<?php if( $post['spayed'] == 'yes' ) 
												           echo '<img src="img/yes.png" alt="...">';
												        else 
												           echo '<img src="img/.png" alt="-">';
														?>
												      	
														</div>
												      	<h6><?= $post['spayed'] ?></h6></td>
												      <td class="col-sm-3"><h5><?= $post['weight'] ?></h5><h6>Pounds</h6></td>
												    </tr>
												</tbody>	
											</table>				
										</div>
									 </div>
								 </div>												

								<?php endwhile; ?>														
													
							</div>
							
							<div class="text-center">
								<a href="signup.html" class="btn btn-danger">Sign up</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="feature-four">
			<div class="container">
				<div class="feature-content">
					<div class="row align-items-center justify-content-around">					
						<div class="col-lg-12">
							<h1 class="text-center">Affordable options, tailored to your needs</h1>
							<p class="text-center">All services include live updates including photos and chat, as well as notifications of sitter arrival and departure times.</p>

							<div class="row align-items-center justify-content-around">
								<div class="col-lg-3">
																												
									<div class="card text-center align-items-center service">
										<div class="service-icon rounded-circle d-flex align-items-center justify-content-around">
											<img src="img/Flower icon.png" alt="...">
										</div>
										<div class="container">
											<h2>Dog walk</h2>
											<p>We’ll take your pup for a 30 minute walk and make sure he or she has fresh food and water.</p>

										</div>
										<div class="price">
											<h1>$15</h1>
											<p>PER 30 MIN WALK</p>
										</div>
									</div>
																		
								</div>
								<div class="col-lg-3">
																												
									<div class="card text-center align-items-center service">
										<div class="service-icon rounded-circle d-flex align-items-center justify-content-around">
												<img src="img/Wave icon.png" alt="..." class="rounded-circle">
										</div>
										<div class="container">
											<h2>Drop-in visit</h2>
											<p>We’ll stop by to snuggle, feed, and play with your pets in the comfort of their own home.</p>								
										</div>
										<div class="price">
											<h1>$15</h1>
											<p>PER 30 MIN VISIT</p>
										</div>
									</div>
																		
								</div>
								<div class="col-lg-3">
																												
									<div class="card text-center align-items-center service">
										<div class="service-icon rounded-circle d-flex align-items-center justify-content-around">
											<img src="img/Home icon.png" alt="..." class="rounded-circle">
										</div>
										<div class="container">
											<h2>House sitting</h2>
											<p>We’ll stay overnight with your pets to make sure they have round-the-clock love.</p>
																						
										</div>
										<div class="price">
											<h1>$45</h1>
											<p>PER NIGHT</p>
										</div>
									</div>
																		
								</div>
							</div>
							
							<div class="text-center">
								<a href="signup.html" class="btn btn-dark">Sign up</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="contact">
			<div class="container">
				<div class="row align-items-center justify-content-around text-center">
					<div class="col-4">
						<h1>Contact</h1>
						<h1>481-624-3240</h1>
						<h1><a href="mailto:info@pawtastic.com">E-mail us</a>

					</div>
				</div>
			</div>
		</footer>

  		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  		<script type="text/javascript" src="js.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

	</body>
</html>