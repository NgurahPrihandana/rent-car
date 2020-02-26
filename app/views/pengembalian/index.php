<div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card">
        <div class="card-header d-flex p-2">
            <div><i class="fas fa-list fa-2x"></i><span class="fa-2x"></span></div>
        </div>
        <div class="card-body">
        <table class="table text-center table-bordered" id="tablePengeluaran">
                <caption>List Mobil</caption>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                <?php foreach($data['spc_mobil_kembali'] as $mobil)    :?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $mobil['nama_mobil']?></td>
                        <td><?= $mobil['plat']?></td>
                        <td><?= $mobil['tanggal_peminjaman']?></td>
                        <td><?= $mobil['tanggal_pengembalian']?></td>
                        <td><?= $mobil['biaya_peminjaman']?></td>
                        <td><a href="<?= BASEURL;?>/pengembalian/hapus/<?= $mobil['id_pengembalian']?>/<?= $mobil['id_peminjaman']?>" 
                            onclick="return confirm('Yakin Untuk Menghapus Pengeluaran Mobil Ini ?');" 
                            class="btn btn-danger btn-sm">Hapus</a></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
