

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-12 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                <?= Flasher::Flash();?>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Super Rent Car</h1>
                  </div>
                  <br>
                  <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Enter Username...">
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                      Login
                    </button>
                  </form>
                  <br>
                  <hr>
                  <br>
                  <div class="text-center">
                    <a class="small" href="<?= BASEURL;?>/auth/register">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

</div>
