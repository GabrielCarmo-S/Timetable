@extends('layouts.html')

@section('content')
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $titleContent }}</h1>
    </div>

    @component('layouts.tables.table', ['tableTitle' => 'Tabela Lições', 'name' => 'dataTable'])
      @section('dataTable-thead')
        @component('layouts.tables.th')
          @slot('text')
            Curso
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Modulo
          @endslot
        @endcomponent

        {{-- @component('layouts.tables.th')
        @slot('text')
          ID Lição
        @endslot
      @endcomponent --}}

        @component('layouts.tables.th')
          @slot('text')
            Nome Lição
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Obrigatório
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Data
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Hora
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Professor Responsável
          @endslot
        @endcomponent
      @endsection

      @section('dataTable-tbody')
        @foreach ($data as $item)
          @component('layouts.tables.tr')
            @slot('text')
              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->course_name }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->module_name }}
                @endslot
              @endcomponent

              {{-- @component('layouts.tables.td')
              @slot('text')
                {{ $item->lesson_id }}
              @endslot
            @endcomponent --}}

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->lesson_name }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->is_mandatory == 1 ? 'Sim' : 'Não' }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ date('d/m/Y', strtotime($item->lesson_date)) }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->lesson_time }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->teacher_name }}
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
          <h5 class="modal-title">Cadastrar Lições</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row d-flex">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
              <label for="lesson_name">Nome</label>
              <input type="text" name="lesson_name" id="lesson_name" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="module_id">Modulo</label>
              <select name="module_id" id="module_id" class="form-control" required></select>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="is_mandatory">Obrigatório</label>
              <select name="is_mandatory" id="is_mandatory" class="form-control" required>
                <option value="0">Não</option>
                <option value="0">Sim</option>
              </select>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="lesson_date">Data</label>
              <input type="date" name="lesson_date" id="lesson_date" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
              <label for="lesson_time">Hora</label>
              <input type="time" name="lesson_time" id="lesson_time" class="form-control" required>
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
