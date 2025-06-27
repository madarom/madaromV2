
@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Parametres</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body config-body">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Emails Notification Admin
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @include('admin.config.mail')
                </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingCat">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCat" aria-expanded="false" aria-controls="collapseCat">
                  Maintenance
                </button>
                </h2>
                <div id="collapseCat" class="accordion-collapse collapse" aria-labelledby="headingCat" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @include('admin.config.maintenance')
                </div>
                </div>
              </div>
              <div class="accordion-item">
                  <h2 class="accordion-header" id="headingCat">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSCat" aria-expanded="false" aria-controls="collapseSCat">
                      Unités
                    </button>
                  </h2>
                  <div id="collapseSCat" class="accordion-collapse collapse" aria-labelledby="headingCat" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      @include('admin.config.unite')
                    </div>
                  </div>
              </div>

      
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection