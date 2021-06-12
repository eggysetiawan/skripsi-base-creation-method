  <div class="row justify-content-center">
      <ul class="list-group list-group-horizontal-md">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Morbi leo risus</li>
      </ul>
  </div>

  <div class="row justify-content-center">
      @for ($i = 1; $i <= 6; $i++)
          <div class="col-md-4 mb-4">
              <div class="card" style="width: 18rem;">
                  <img src="{{ asset('images/sample' . $i . '.jpg') }}" class="card-img-top" alt="..." height="200">
                  <div class="card-img-overlay">
                      <h5 class="card-title "
                          style="text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Judul
                          Karya</h5>
                  </div>
                  <div class="card-body">
                      <p class="card-text">Ini adalah deskripsi dari karya yang ditampilkan.</p>
                  </div>
              </div>
          </div>
      @endfor
  </div>
