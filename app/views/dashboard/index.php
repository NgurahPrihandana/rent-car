<div class="container d-flex mb-5">
<!-- Mobil -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card hover border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="font-weight-bold text-primary text-uppercase mb-1">Jumlah Mobil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['mobil']);?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-car fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card hover border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Member</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['as']);?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- Container -->

<div class="container d-flex">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card hover border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="font-weight-bold text-info text-uppercase mb-1">Peminjaman</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($data['peminjaman']);?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card hover border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="font-weight-bold text-warning text-uppercase mb-1">Transaksi Berhasil</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($data['pengembalian']);?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- container-->
