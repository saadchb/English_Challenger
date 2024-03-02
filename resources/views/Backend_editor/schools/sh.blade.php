<!doctype html> 
<html lang="en"> 

<head> 
<link href= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
		rel="stylesheet" integrity= 
"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
		crossorigin="anonymous"> 
	<script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity= 
"sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"> 
	</script> 
</head> 

<body> 
	<h1 class="m-4 text-success">GeeksforGeeks</h1> 
	<h4 class="ms-4">Bootstrap 5 Cards Horizontal</h4> 
	<div class="container"> 
		<button type="button" class="btn btn-success mt-4"
			data-bs-toggle="modal" data-bs-target="#cardModal"> 
			Launch Modal 
		</button> 
		<div class="modal fade" id="cardModal" tabindex="-1"
			aria-labelledby="cardModalLabel" aria-hidden="true"> 
			<div class="modal-dialog"> 
				<div class="modal-content"> 
					<div class="modal-header"> 
						<h5 class="modal-title" id="cardModalLabel"> 
							This Modal Contains a Card 
						</h5> 
						<button type="button" class="btn-close"
							data-bs-dismiss="modal" aria-label="Close"> 
						</button> 
					</div> 
					<div class="modal-body"> 
						<div class="container d-flex mt-4 p-4"> 
							<div class="card mb-3" style="max-width: 540px;"> 
								<div class="row g-0"> 
									<div class="col-md-6"> 
										<img src= 
	"https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190710102234/download3.png"
											class="img-fluid rounded-start" alt="..."> 
									</div> 
									<div class="col-md-6"> 
										<div class="card-body"> 
											<h5 class="card-title"> 
												Data Structures 
											</h5> 
											<p class="card-text"> 
												A data structure is a storage that is 
												used to store and organize data. 
											</p> 
											<p class="card-text"> 
												<small class="text-muted"> 
													Last updated now 
												</small> 
											</p> 
										</div> 
									</div> 
								</div> 
							</div> 
						</div> 
					</div> 
					<div class="modal-footer"> 
						<button type="button" class="btn btn-danger"
							data-bs-dismiss="modal"> 
							Ok, I Got it! 
						</button> 
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
</body> 
</html>
