<!-- Begin Page Content -->


<!-- Content Row -->

<div class="row">
      <div class="container-fluid mt-1 table-responsive shadow p-4 mb-5 bg-white rounded">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-between">
            <div><i class="fas fa-user-alt fa-2x"></i></div>
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target=".modalTambahMember">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah Member</span>  
            </button>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-lg-12 m-auto">
        <table class="table text-center mt-4 table-sm text-center table-bordered" id="tableMember">
          <caption>List Of Member</caption>
          <thead class="thead-dark">
            <tr>
              <th scope="col">N0</th>
              <th scope="col">Nama</th>
              <th scope="col">Nomor Ktp</th>
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1?>
              <?php foreach ($data['as'] as $m) : ?>
                <tr>
                <td><?=$i++?></td>
                <td><?=$m['nama'] ?></td>
                <td><?=$m['nomor_ktp'] ?></td>
                <td><?=$m['alamat'] ?></td>
                <td><?=$m['tanggal_lahir'] ?></td>
                <td><a href="<?= BASEURL?>/member/edit/<?= $m['id_member']?>" class="btn btn-primary btn-sm">Edit</a> | <a href="<?= BASEURL;?>/Member/hapus/<?= $m['id_member']?>" onclick="return confirm('Yakin Untuk Menghapus Member Ini ?');" class="btn btn-danger btn-sm">Hapus</a></td>
                </tr>
              <?php endforeach; ?>
          </tbody>
          
        </table>
        </div>
        </div>
      </div>            
</div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-6 mb-4">

    

    

  </div>

  <div class="col-lg-6 mb-4">

    

  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
        <div class="modal fade modalTambahMember" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-4 bg-gambar">
                    
                    </div>
                    <div class="col-lg-8">
              <div class=" text-center p-3" data-dismiss="modal" role="alert">
                  Inputkan Peminjaman Baru <a href=""><i class="fas fa-circle float-right" style="color:red;"></i></a>
              </div>
              <div class="form mt-3 container">
                  <form action="<?=BASEURL; ?>/Member/tambah" method="post">
                    <div class="form-group">
                      <input type="hidden" value="">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama  :</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="form-group">
                      <label for="nomor_ktp">Nomor KTP  :</label>
                      <input type="number" class="form-control" id="nomor_ktp" name="nomor_ktp" required>
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat  :</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir  :</label>
                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Member</button>
                    <button type="reset" class="btn btn-danger mb-3 mr-2 float-right">Reset</button>
                  </form>
                </div>
                </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Modal End -->