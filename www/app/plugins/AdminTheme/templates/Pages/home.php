<div class="row">
    <div class="col-xl-3 col-lg-6">
        <a class="link-widget" data-toggle="modal" data-target="#users">
          <div class="card l-bg-blue-dark">
              <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                  <div class="mb-4">
                      <h5 class="card-title mb-0">Brugere</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                      <div class="col-8 justify-content-left">
                          <h2 class="d-flex align-items-center mb-0">
                              <?php //echo $profiles->Amount; ?>
                          </h2>
                      </div>
                  </div>
              </div>
          </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6">
        <a class="link-widget" data-toggle="modal" data-target="#await-approval">
          <div class="card l-bg-orange-dark">
              <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-sync"></i></div>
                  <div class="mb-4">
                      <h5 class="card-title mb-0">Afventende Ansøgninger</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                      <div class="col-8 justify-content-left">
                          <h2 class="d-flex align-items-center mb-0">
                              <?php //echo $pending->Amount; ?>
                          </h2>
                      </div>
                  </div>
              </div>
          </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6">
        <a class="link-widget" data-toggle="modal" data-target="#approved">
          <div class="card l-bg-green-dark">
              <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"><i class="fas fa-check"></i></div>
                  <div class="mb-4">
                      <h5 class="card-title mb-0">Godkendte Ansøgninger</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                      <div class="col-8 justify-content-left">
                          <h2 class="d-flex align-items-center mb-0">
                              <?php //echo $approved->Amount; ?>
                          </h2>
                      </div>
                  </div>
              </div>
           </div>
         </a>
    </div>
    <div class="col-xl-3 col-lg-6">
      <a class="link-widget" data-toggle="modal" data-target="#denied">
        <div class="card l-bg-red-dark">
            <div class="card-statistic-3 p-4">
                <div class="card-icon card-icon-large"><i class="fas fa-times"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">Afviste Ansøgninger</h5>
                </div>
                <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8 justify-content-left">
                        <h2 class="d-flex align-items-center mb-0">
                            <?php //echo $denied->Amount; ?>
                        </h2>
                    </div>
                </div>
            </div>
         </div>
       </a>
    </div>
</div>