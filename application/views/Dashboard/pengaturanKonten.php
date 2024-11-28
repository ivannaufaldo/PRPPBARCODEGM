    <title>Pengaturan Konten</title>
  </head>
  <body>
  <div class="d-flex justify-content-center">       
  <div class="container">
    <?php foreach($kokab as $kk):?>   
        <div class="row">
            <div class="col-md">
                <h4>Konten <?=$kk->KotaKabupaten ?></h4>
            </div>
            <div class="col-md">
                <a id="tambah" class="btn btn-success" href="<?= base_url('index.php/Dashboard/tambahKonten/'.$kk->ID) ?>">Tambah Konten</a>
            </div>
        </div>
    <?php endforeach; ?> 
    <div class="row">
      <div class="col-md">
        <?php if($this->session->flashdata('flash')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center;">
          Konten <strong>Berhasil</strong> <?= $this->session->flashdata('flash');?>!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
      </div>
    </div>
    <table class="table table-bordered" id="tabel-konten">
        <tr style="background-color: #4E545C;color:White">
            <th style="text-align: center;">No</th>
            <th>Konten</th>
            <th style="text-align: center;">Edit</th>
            <th style="text-align: center;">Delete</th>
        </tr>
        <?php 
            $i = 1;
            foreach ($konten->result() as $k=>$data){    
        ?>
    	    <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td ><?=$data->konten?></td>
                <td style="text-align: center;"><a class="btn btn-warning" style="jus: center;" href="<?php echo base_url('index.php/Dashboard/EditKonten/'.$data->Id_konten) ?>">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="text-align: center;"><a class="btn btn-danger" href="<?php echo base_url('index.php/Dashboard/DeleteKonten/'.$data->Id_konten) ?>">Delete <i class="fa-solid fa-trash"></i></a></td>
            </tr>
    	<?php 
    }?>
    </table>
    
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
