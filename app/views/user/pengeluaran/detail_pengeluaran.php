<div class="container shadow p-4 mb-5 bg-white rounded">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user-alt mr-2"></i>
    <h5 class=" d-inline-block mb-0">Edit Pengeluaran</h5>
    <a href="<?= BASEURL?>/user/pengeluaran"><i class="fas fa-circle float-right mt-1" style="color:red;"></i></a>
  </div>
  <div class="card-body">
    <form action="<?= BASEURL?>/pengeluaran/runEdit" method="post">
            <div class="form-group">
                <label for="id_mobil">Nama Mobil</label>
                <select class="form-control" name="id_mobil">
                            <?php foreach($data['mobil'] as $mobil) :?>
                                <?php if($data['getSpcPengeluaran']['id_mobil']==$mobil['id_mobil'])  :?>
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
                <input type="hidden" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?= $data['getSpcPengeluaran']['id_pengeluaran']?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengeluaran" name="id_mobil_awal" value="<?= $data['getSpcPengeluaran']['id_mobil']?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengeluaran" name="type_awal" value="<?= $data['getSpcPengeluaran']['type']?>">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type">
                            <?php $select="selected"?>
                                <?php if($data['getSpcPengeluaran']['type']==1)  :?>
                                    <option <?=$select?> value="1">Samsat</option>
                                    <option value="2">Service</option>
                                <?php else :?>
                                    <option value="1">Samsat</option>
                                    <option <?=$select?> value="2">Service</option>
                                <?php endif;?>
                </select>
            </div>

            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $data['getSpcPengeluaran']['nominal']?>">
            </div>

            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="<?= $data['getSpcPengeluaran']['tanggal_pengeluaran']?>">
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <button type="submit" class="btn btn-primary mb-2">Edit Data Pengeluaran</button>
            </div>
    </form>
    </div>
</div> <!-- card -->
</div> <!-- container -->
