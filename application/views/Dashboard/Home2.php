<body>
    <!--ini coba   -->
    <!--    <script src="<?= base_url('/assets/ckeditorNEW/ckeditor.js');?>"></script>-->
    <!--    <textarea name="coba" id="coba"></textarea>-->
    <!--    <script>-->
    <!--        CKEDITOR.replace( 'coba' );-->
    <!--    </script>-->
    <!-- ini coba -->
  <div class="d-flex justify-content-center">    
  <div class="container">
    <div class="row mt-3">
      <div class="col-md">
        <h4 style="margin-bottom: 20px;">Data Kota/Kabupaten Jawa Tengah</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <form action="<?= base_url('index.php/Dashboard')?>" method="post">
          <div class="input-group mb-3">
            <input type="text" name="keyword" autocomplete="off" class="form-control" placeholder="Cari Nama Kota/Kabupaten" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $this->session->userdata('keyword') ?>">
            <input class="btn btn-primary" type="submit" name="submit" id="button-addon2" >
          </div>
        </form>
      </div>
      <div class="col">
        <!-- <a id="tambah" class="btn btn-success" href="<?= base_url('index.php/Dashboard/TambahKotaKabupaten') ?>">Tambah Kota/Kabupaten</a> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md">
        <?php if($this->session->flashdata('flash')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center;">
          Data Kota/Kabupaten <strong>Berhasil</strong> <?= $this->session->flashdata('flash');?>!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
      </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
          <tr style="background-color: #4E545C;color:White">
              <th style="text-align: center;">No</th>
              <th>Nama Kota / Kabupaten</th>
              <th style="text-align: center;">Action</th>
              <th style="text-align: center;">Preview</th>
              <!-- <th style="text-align: center;">QR Code</th> -->
              <!--<th style="text-align: center;">QR CODE</th>-->
              <!-- <th style="text-align: center;">Delete</th> -->
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($row->result() as $kk=>$data){    
          ?>
            <tr>
              <td style="text-align: center;"><?= ++$start ?></td>
              <td><?=$data->KotaKabupaten?></td>
              <td style="text-align:center;">
                <a class="btn btn-secondary" href="<?php echo base_url('index.php/Dashboard/pengaturanKonten/'.$data->ID) ?>" >Atur Konten <i class="fa-solid fa-gear"></i></a>
                <!-- <a style="margin-left: 10px;margin-right:10px;" class="btn btn-warning" href="<?php echo base_url('index.php/Dashboard/EditKotaKabupaten/'.$data->ID) ?>">Edit <i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-danger" href="<?php echo base_url('index.php/Dashboard/DeleteKotaKabupaten/'.$data->ID) ?>">Delete <i class="fa-solid fa-trash"></i></a> -->
              </td>
              <td style="text-align: center;"><a class="btn btn-outline-primary" href="<?= base_url('index.php/Dashboard/Preview/'.$data->ID)?>">View</a></td>
                <!--<td style="text-align: center;"><a class="btn btn-primary" href="#">Generate QR</a></td>-->
                <!-- <td style="text-align: center;"><a class="btn btn-danger" href="<?php echo base_url('index.php/Dashboard/DeleteKotaKabupaten/'.$data->ID) ?>">Delete <i class="fa-solid fa-trash"></i></a></td> -->
            </tr>
          <?php 
        }?>
        </tbody>
        
    </table>
    <?php if (empty($row->result())):?>
            <tr>
              <td>
              <div class="alert alert-danger" role="alert" style="text-align: center;" >
                Data not found!!
              </div>
              </td>
            </tr>  
          <?php endif; ?>
    <?= $this->pagination->create_links(); ?>
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
