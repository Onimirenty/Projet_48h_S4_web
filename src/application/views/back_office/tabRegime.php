
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau des regimes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Regime</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table</h5>
              <!-- Primary Color Bordered Table -->
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($regime as $p) { ?>
                    <tr>
                      <td><?php echo $p->nom; ?></td>
                      <td><a href="<?php echo base_url().'CRegime/update'?>/<?php echo $p->id; ?>/<?php echo $p->nom; ?>"><button class="btn btn-primary">Modifier</button></a></td>
                      <td><a href="<?php echo base_url().'CRegime/delete'?>/<?php echo $p->id; ?>"><button class="btn btn-primary">Supprimer</button></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Primary Color Bordered Table -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

