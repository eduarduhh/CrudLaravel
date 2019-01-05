 @extends('template.layout')
 @section('conteudo')


  <h1 class="text-center"> PRODUTO</h1>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <a href="{{url('/produtos/create')}}" class="btn btn-outline-success">Cadastrar</a>

  <hr>
    <div class="table-responsive">
      @if (session('cad'))
        <div class="alert alert-success pull-right">
            <a href="#" class="close"
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('cad') }}
        </div>
        @endif
         @if (session('up'))
        <div class="alert alert-warning pull-right">
            <a href="#" class="close"
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('up') }}
        </div>
        @endif
         @if (session('del'))
        <div class="alert alert-danger pull-right">
            <a href="#" class="close"
               data-dismiss="alert"
               aria-label="close">&times;</a>
            {{ session('del') }}
        </div>
        @endif
      <table class="table table-bordered table-condensed table-hover" cellspacing="0" width="100%">
        <thead>

          <th>DESCRICAO</th>
          <th>CATEGORIA</th>
          <th>QUANTIDADE</th>
          <th>OPÇÕES</th>

        </thead>
               @foreach ($produtos as $prod)
        <tr>

          <td>{{ $prod->descricao}}</td>
          <td>{{ $prod->categoria}}</td>
          <td>{{ $prod->quantidade}}</td>
         <td>
                <form action="{{ route('produtos.destroy',$prod->codigo) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('produtos.edit',$prod->codigo) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </table>
    </div>
    {{$produtos->render()}}
  </div>
</div>
@stop
