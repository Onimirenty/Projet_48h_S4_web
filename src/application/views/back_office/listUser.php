
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>List Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">List users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Utilisateurs</h5>

              <!-- List group With badges -->
              <ul class="list-group">
                <?php foreach($list as $p) { ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $p->nom; ?> <?php echo $p->prenom; ?>
                    <span class="badge bg-primary rounded-pill"></span>
                  </li>
                <?php } ?>
              </ul><!-- End List With badges -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->