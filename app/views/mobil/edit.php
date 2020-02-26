<div class="container shadow p-4 mb-5 bg-white rounded">
<div class="card">
  <div class="card-header">
  <i class="fas fa-user-alt mr-2"></i>
    <h5 class=" d-inline-block mb-0">Edit Member</h5>
    <a href="<?= BASEURL?>/mobil"><i class="fas fa-circle float-right mt-1" style="color:red;"></i></a>
  </div>
  <div class="card-body">
    <form action="<?= BASEURL?>/mobil/runEdit" method="post">
            <input type="hidden" class="form-control" name="id_mobil" value="<?= $data['getSpcMobil']['id_mobil']?>">

            <div class="form-group">
                <label for="nama_mobil">Nama Mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" value="<?= $data['getSpcMobil']['nama_mobil']?>">
            </div>
            <div class="form-group">
                <label for="jenis_mobil">Jenis Mobil</label>
                <select class="form-control" name="jenis_mobil">
                            <?php foreach($data['jenis'] as $jenis) :?>
                                <?php if($data['getSpcMobil']['id_jenis_mobil']==$jenis['id_jenis_mobil'])  :?>
                                    <?php $select="selected"?>
                                <?php else :?>
                                    <?php $select=""?>
                                <?php endif;?>
                                <option <?=$select ?> value="<?= $jenis['id_jenis_mobil'] ?>"><?= $jenis['jenis_mobil']; ?></option>
                            <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="plat">Plat</label>
                <input type="text" class="form-control" id="plat" name="plat" value="<?= $data['getSpcMobil']['plat']?>">
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <button type="submit" class="btn btn-primary mb-2">Edit Data Mobil</button>
            </div>
    </form>
    </div>
</div> <!-- card -->
</div> <!-- container -->
