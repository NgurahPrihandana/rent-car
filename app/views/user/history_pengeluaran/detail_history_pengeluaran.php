<div class="container shadow p-4 mb-5 bg-white rounded">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user-alt mr-2"></i>
    <h5 class=" d-inline-block mb-0">Detail History Pengeluaran</h5>
    <a href="<?= BASEURL?>/user/history_pengeluaran/index"><i class="fas fa-circle float-right mt-1" style="color:red;"></i></a>
  </div>
  <div class="card-body">
    <form action="<?= BASEURL?>/pengeluaran/runEdit" method="post">
            <div class="form-group">
                <label for="id_mobil">Nama Mobil</label>
                <select class="form-control" name="id_mobil" disabled>
                            <?php foreach($data['mobil'] as $mobil) :?>
                                <?php if($data['spc_history_pengeluaran']['id_mobil']==$mobil['id_mobil'])  :?>
                                    <?php $select="selected"?>
                                <?php else :?>
                                    <?php $select=""?>
                                <?php endif;?>

                                <?php if($mobil['status']==2)   :?>
                                <option disabled class="text-danger" <?=$select; ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Diservis</option>
                                <?php endif;?>

                                <?php if($mobil['status']==0)   :?>
                                <option disabled class="text-warning" <?=$select ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Disewa</option>
                                <?php endif;?>

                                <?php if($mobil['status']==1)   :?>
                                <option disabled class="text-primary" <?=$select ?> value="<?= $mobil['id_mobil'] ?>"><?= $mobil['nama_mobil']; ?> ===> Tersedia</option>
                                <?php endif;?>

                            <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengeluaran" name="id_pengeluaran" value="<?= $data['spc_history_pengeluaran']['id_pengeluaran']?>" disabled>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengeluaran" name="id_mobil_awal" value="<?= $data['spc_history_pengeluaran']['id_mobil']?>" disabled>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengeluaran" name="type_awal" value="<?= $data['spc_history_pengeluaran']['type']?>" disabled>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" name="type" disabled>
                            <?php $select="selected"?>
                                <?php if($data['spc_history_pengeluaran']['type']==1)  :?>
                                    <option <?=$select?> value="1" disabled>Samsat</option>
                                    <option value="2" disabled>Service</option>
                                <?php else :?>
                                    <option value="1" disabled>Samsat</option>
                                    <option <?=$select?> value="2" disabled>Service</option>
                                <?php endif;?>
                </select>
            </div>

            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $data['spc_history_pengeluaran']['nominal']?>" disabled>
            </div>

            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="<?= $data['spc_history_pengeluaran']['tanggal_pengeluaran']?>" disabled>
            </div>

            <!-- <div class="d-flex flex-row-reverse mt-4">
                <button type="submit" class="btn btn-primary mb-2">Edit Data Pengeluaran</button>
            </div> -->
    </form>
    </div>
</div> <!-- card -->
</div> <!-- container -->
