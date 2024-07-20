<x-head></x-head>
<section class="vh-100" style="background-color: #070F2B">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem; background-color: #1B1A55">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="" method="POST">
                @csrf
                <h2 class="fw-bold mb-2 text-uppercase">Login Page</h2>
                @if (session()->has('gagal'))
                    <div class="text-danger" role="alert">
                        <span class="font-semibold">{{ session('gagal') }}</span>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="text-primary" role="alert">
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @endif
                <p class="text-white-50 mb-5">Please enter your login username and password</p>
                <div class="form-floating mb-3 text-black-50">
                  <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Username" required>
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 text-black-50">
                  <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg my-5 px-5 fw-bold" type="submit">LOGIN</button>
                <div>
                  <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
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