<body>
  <div class="d-flex justify-content-center">       
  <div class="container">
  <h4>Ganti Password</h4>    
  <form method="POST" action="<?php echo base_url('index.php/Dashboard/UpdatePassword') ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label id = "Password1" for="Password1">
					Password baru :
			</label>
			<input type="password" class="form-control" name="Password1" id="Password1">
			<small><span class="text-danger"><?= form_error('Password1'); ?></span></small>    
		</div>
		<div class="form-group">
			<label >
					Masukkan ulang Password baru :
			</label>
			<input type="password" class="form-control" name="Password2" id="Password2">
			<small><span class="text-danger"><?= form_error('Password2'); ?></span></small>    
		</div>
	        <input type="hidden" class="form-control" name="id" id="id" value="<?= $id ?>">
			<button type="Submit" id = "submit" class="btn btn-warning" name="submit" value="submit">Submit</button>
	</form>
	<div class="row">
		<div class="col-md">
			<?php if($this->session->flashdata('gantipas')):?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('gantipas');?>
				</div>
			<?php endif;?>
		</div>
	</div>
  </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

