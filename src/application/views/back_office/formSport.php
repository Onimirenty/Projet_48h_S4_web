
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Formulaire Activites sportives</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Sports</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form</h5>

              <!-- Vertical Form -->
              <form class="row g-3" action="<?php echo base_url().'CSport/insertion'?>" method="post">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nom </label>
                  <input type="text" class="form-control" id="inputNanme4" name="nom">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Prix </label>
                  <input type="number" class="form-control" id="inputEmail4" name="prix">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
