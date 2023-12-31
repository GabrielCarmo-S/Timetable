                    <div class="card shadow mb-4">
                      <div class="d-flex align-items-center justify-content-between card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $tableTitle }}</h6>

                        <button class="btn btn-success" title="Adicionar" type="button" data-toggle="modal"
                          data-target="#cadastrar">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="{{ $name }}" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                @yield($name . '-thead')
                              </tr>
                            </thead>
                            <tbody>
                              @yield($name . '-tbody')
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <script defer>
                      $(document).ready(function() {
                        $("{{ '#' . $name }}").DataTable({
                          language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                          }
                        });
                      });
                    </script>
