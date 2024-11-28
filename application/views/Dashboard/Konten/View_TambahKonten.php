    <title>Tambah Konten</title>
  </head>
  <body>
  <div class="d-flex justify-content-center">       
  <div class="container">
    <!-- ckfinder -->
    <script src="<?= base_url('/assets/ckfinder/ckfinder.js');?>"></script>
    <?php foreach($kokab as $kk):?>
      <h4>Form Tambah Konten <?= $kk->KotaKabupaten?></h4>    
      <form method="POST" action="<?php echo base_url('index.php/Dashboard/ActionTambahKonten') ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label id = "konten" for="konten">
              Judul Konten 
          </label>
          <input type="text" autocomplete="off" class="form-control" name="konten" id="konten" value="<?= set_value('konten')?>"> 
			    <small><span class="text-danger"><?= form_error('konten'); ?></span></small>    
          <input type="hidden" class="form-control" name="ID" id="ID" value="<?php echo $kk->ID?>">
        </div>
        <div class="form-group" >
          <label>
              Isi konten <?= $kk->KotaKabupaten?>
          </label>
          <textarea type="text" class="form-control" name="isi_konten" id="isi_konten" ><?= set_value('isi_konten')?></textarea>
			    <small><span class="text-danger"><?= form_error('isi_konten'); ?></span></small>    
        </div>
          <a id = "cancel" href="<?php echo base_url('index.php/Dashboard/pengaturanKonten/'.$kk->ID)?>" class="btn btn-secondary">Cancel</a>
          <button type="Submit" id = "submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
      </form>
    <?php endforeach; ?>
  </div>
  </div>
  <!-- Script for CKEDITOR & CKFINDER -->
  <script>
    var text = CKEDITOR.replace( 'isi_konten' );
    CKFinder.setupCKEditor( text );
  </script>
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

