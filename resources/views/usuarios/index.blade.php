@extends('layouts.html')

@section('content')
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ $titleContent }}</h1>
    </div>

    @component('layouts.tables.table', ['tableTitle' => 'Tabela Usuários', 'name' => 'dataTable'])
      @section('dataTable-thead')
        @component('layouts.tables.th')
          @slot('text')
            ID
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Nome
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Email
          @endslot
        @endcomponent

        @component('layouts.tables.th')
          @slot('text')
            Level Permissão
          @endslot
        @endcomponent
      @endsection

      @section('dataTable-tbody')
        @foreach ($data as $item)
          @component('layouts.tables.tr')
            @slot('text')
              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_id }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_name }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_email }}
                @endslot
              @endcomponent

              @component('layouts.tables.td')
                @slot('text')
                  {{ $item->user_level }}
                @endslot
              @endcomponent
            @endslot
          @endcomponent
        @endforeach
      @endsection
    @endcomponent
  </div>
@endsection
