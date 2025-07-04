<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta charset="UTF-8" />
      <title>Mad'Arom | Admin</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link rel="icon" type="image/x-icon" href="/assets/images/favicon_madarom.png">
      <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">
      <link href="/assets/css/admin.css" rel="stylesheet">

      
      <meta name="csrf-token" content="{{ csrf_token() }}">

      @stack('styles')
    </head>

    <body>
        

      <main>
        <div class="container">

          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="/assets/images/logo_madarom.png" alt="">
                    </a>
                  </div><!-- End Logo -->

                  <div class="card mb-3">

                    <div class="card-body">

                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Connectez-vous</h5>
                        
                      </div>
                      @if(\Session::has('error'))
                      <div class="alert alert-danger" role="alert">
                      Veuillez verifier les informations de connexion
                      </div>
                      @endif

                      @if(\Session::has('error_credentials'))
                      <div class="alert alert-danger" role="alert">
                      Connexion erronée 
                      </div>
                      @endif
                      <form class="row g-3 needs-validation" method="POST" action="{{route('admin.login')}}" novalidate>
                        {{ csrf_field() }}
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Login Administrateur</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="email" class="form-control" id="yourUsername" required>
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Mot de passe</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>

                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                      </form>

                    </div>
                  </div>


                </div>
              </div>
            </div>

          </section>

        </div>
      </main><!-- End #main -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->

      <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/vendor/chart.js/chart.umd.js"></script>
      <script src="/assets/vendor/echarts/echarts.min.js"></script>
      <script src="/assets/vendor/quill/quill.min.js"></script>
      <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="/assets/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="/assets/js/admin.js"></script>
      @stack('scripts')
    </body>
</html>