<x-head></x-head>
<section class="vh-100" style="background-color: #070F2B">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem; background-color: #1B1A55">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="">
                <h2 class="fw-bold mb-2 text-uppercase">Register Page</h2>
                <p class="text-white-50 mb-5">Please enter your personal information</p>
                <div class="form-floating mb-3 text-black-50">
                  <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 text-black-50">
                  <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3 text-black-50">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Email">
                    <label for="floatingEmail">Email</label>
                  </div>
                <div class="form-floating mb-3 text-black-50">
                    <input type="text" name="nip" class="form-control" id="floatingNip" placeholder="nip 9 angka">
                    <label for="floatingNip">NIP 9 digit</label>
                  </div>
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg my-5 px-5 fw-bold text-uppercase" type="submit">Daftar</button>
                <div>
                  <p class="mb-0">Sudah punya akun? <a href="/" class="text-white-50 fw-bold">Sign In</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<x-foot></x-foot>