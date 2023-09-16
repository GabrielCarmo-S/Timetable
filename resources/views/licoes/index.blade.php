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
@endsection
