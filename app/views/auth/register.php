<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
            <?= Flasher::Flash();?>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?= BASEURL?>/auth/register">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nama_pekerja" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="username" class="form-control form-control-user" id="exampleLastName" placeholder="Username">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="conf_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="register">
                    Register Account
                </button>
              </form>
              <br>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center">
                <a class="small" href="<?= BASEURL;?>/auth/login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>