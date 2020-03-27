<div class="container shadow p-4 mb-5 bg-white rounded">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user-alt mr-2"></i>
    <h5 class=" d-inline-block mb-0">Edit Peminjaman</h5>
    <a href="<?= BASEURL?>/user/peminjaman"><i class="fas fa-circle float-right mt-1" style="color:red;"></i></a>
  </div>
  <div class="card-body">
    <form action="<?= BASEURL?>/peminjaman/runEdit" method="post">
            
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_peminjaman" name="id_peminjaman" value="<?= $data['getSpcPeminjaman']['id_peminjaman']?>">
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="id_peminjaman_mobil" name="id_mobil_awal" value="<?= $data['getSpcPeminjaman']['id_mobil']?>">
            </div>

            <div class="form-group">
                <label for="nama_mobil">Nama Mobil</label>
                <select class="form-control" name="id_mobil">
                            <?php foreach($data['mobil'] as $mobil) :?>
                                <?php if($data['getSpcPeminjaman']['id_mobil']==$mobil['id_mobil'])  :?>
                                    <?php $select="selected"?>
                                <?php else :?>
                                    <?php $select=""?>
                                <?php endif;?>

                                <?php if($mobil['status']==2)   :?>
                                <option class="text-danger" <?=$select; ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Diservis</option>
                                <?php endif;?>

                                <?php if($mobil['status']==0)   :?>
                                <option class="text-warning" <?=$select ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Disewa</option>
                                <?php endif;?>

                                <?php if($mobil['status']==1)   :?>
                                <option class="text-primary" <?=$select ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Tersedia</option>
                                <?php endif;?>

                            <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_mobil">Penyewa</label>
                <select class="form-control" name="nama_member">
                    <?php foreach($data['as'] as $peminjam) :?>
                        <?php if($data['getSpcPeminjaman']['id_member']==$peminjam['id_member'])  :?>
                            <?php $select="selected"?>
                        <?php else :?>
                            <?php $select=""?>
                        <?php endif;?>
                        <option <?= $select?> value="<?= $peminjam['id_member'] ?>"><?= $peminjam['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" class="form-control" id="nominal" name="nominal" value="<?= $data['getSpcPeminjaman']['biaya_peminjaman']?>">
            </div>

            <div class="form-group">
                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?= $data['getSpcPeminjaman']['tanggal_peminjaman']?>">
            </div>

            <div class="form-group">
                <label for="waktu_pinjam">Waktu Akhir Kembali</label>
                <input type="date" class="form-control" id="waktu_pinjam" name="waktu_pinjam" value="<?= $data['getSpcPeminjaman']['waktu_pinjam']?>">
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <button type="submit" class="btn btn-primary mb-2">Edit Data Peminjaman</button>
            </div>
    </form>
    </div>
</div> <!-- card -->
</div> <!-- container -->
