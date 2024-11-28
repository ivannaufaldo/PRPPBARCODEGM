  <body>
  <div class="d-flex justify-content-center">       
  <div class="container"> 
  <h4>Form Tambah Data Kota/Kabupaten</h4>    
  <form method="POST" action="<?php echo base_url('index.php/Dashboard/ActionTambahKotaKabupaten/') ?>" >
		<div class="form-group">
			<label>
					Nama Kota/Kabupaten
			</label>
			<input type="text" class="form-control" autocomplete="off" name="nama" id="nama" value="<?= set_value('nama')?>">
			<small><span class="text-danger"><?= form_error('nama'); ?></span></small>    
		</div>
		<div class="form-group">
			<label >
					Link Url Kota/Kabupaten 
			</label>
			<input type="text" class="form-control" autocomplete="off" name="urlkokab" id="urlkokab" value="<?= set_value('urlkokab')?>">
			<small><span class="text-danger"><?= form_error('urlkokab'); ?></span></small>    
		</div>
			<a id = "cancel" href="<?php echo base_url("index.php/Dashboard")?>" class="btn btn-secondary">Cancel</a>
			<button type="Submit" id = "submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
	</form>
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

