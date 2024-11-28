<body>
  <div class="d-flex justify-content-center">       
  <div class="container" style="padding-bottom: 20px;">
  <?php foreach($user as $u):?>
    <h4>Konfirmasi Penghapusan Admin <?= $u->username?></h4>    
    <p>Apakah anda yakin ingin menghapus Admin "<?php echo $u->username?>" ? </p>
    <a id = "cancel" href="<?php echo base_url("index.php/Dashboard")?>" class="btn btn-secondary">Cancel</a>
    <a class="btn btn-danger" href="<?= base_url('index.php/Dashboard/DeleteUser/'.$u->id)?>">Delete</a>
  <?php endforeach; ?> 

  <!-- <form method="GET" action="<?php echo base_url('index.php/Dashboard/ActionDeleteKotaKabupaten') ?>" enctype="multipart/form-data">
		<div class="form-group">
            <input type="hidden" class="form-control" name="ID" id="ID" value="<?php echo $kk->ID?>">
		</div>
        </form> -->
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

