<body>
  <div class="d-flex justify-content-center">       
  <div class="container">
    <div class="row">
        <div class="col-md" style="padding-top: 5px;">
          <h4>User Management</h4>
        </div>
        <div class="col-md">
            <a id="tambah" class="btn btn-success" href="<?= base_url('index.php/Dashboard/add_user')?>">Tambah Admin</a>
        </div>
    </div>
    <div class="row">
      <div class="col-md">
        <?php if($this->session->flashdata('flash')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center;">
          User <strong>Berhasil</strong> <?= $this->session->flashdata('flash');?>!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
        <?php if($this->session->flashdata('flash1')):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center;">
          <?= $this->session->flashdata('flash1');?>!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
      </div>
    </div>
    <table class="table table-bordered" id="tabel-konten">
        <tr style="background-color: #4E545C;color:White">
            <th style="text-align: center;">No</th>
            <th>User</th>
            <th style="text-align: center;">Reset Password</th>
            <th style="text-align: center;">Delete User</th>
        </tr>
        <?php 
            $i = 1;
            foreach ($users->result() as $U=>$data){    
        ?>
    	    <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td ><?=$data->username?></td>
                <td style="text-align: center;"><a class="btn btn-outline-primary" href="<?= base_url('index.php/Dashboard/ResetPassword/'.$data->id)?>">Reset Password <i class="fa-solid fa-pen-to-square"></i></a></td>
                <td style="text-align: center;"><a class="btn btn-outline-danger" href="<?= base_url('index.php/Dashboard/KonfirmasiDeleteUser/'.$data->id)?>">Delete <i class="fa-solid fa-trash"></i></a></td>
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
