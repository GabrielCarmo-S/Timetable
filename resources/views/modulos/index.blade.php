@extends('layouts.html')

@section('content')
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $titleContent }}</h1>
    </div>

    @component('layouts.tables.table', ['tableTitle' => 'Tabela Modulos', 'name' => 'dataTable'])
      @section('dataTable-thead')

        @component('layouts.tables.th')
          @slot('text')
            ID Modulo
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Nome Modulo
          @endslot
        @endcomponent

      @endsection

      @section('dataTable-tbody')
        @foreach ($data as $item)
          @component('layouts.tables.tr')
            @slot('text')

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->module_id }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->module_name }}
                @endslot
              @endcomponent

            @endslot
          @endcomponent
        @endforeach
      @endsection
    @endcomponent
  </div>

  <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="cadastrar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastrar Modulos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
              <label for="module_name">Nome</label>
              <input type="text" name="module_name" id="module_name" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex align-items-center justify-content-between">
          <button type="button" class="btn btn-success"><i class="fas fa-plus pr-1"></i> Cadastrar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i
              class="fas fa-times pr-1"></i>Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
