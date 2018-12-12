 @extends('template.layout')
 @section('conteudo')


@if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
 @endif

  <h1 class="text-center">NOVO PRODUTO</h1>
 <form action="{{ route('produtos.update',$produto->codigo) }}" method="POST">
        @csrf
        @method('PATCH')

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="descricao">DESCRIÇÃO</label>
            <input class="form-control" type="text" name="descricao" id="descricao" value="{{$produto->descricao}}">
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label for="descricao">CATEGORIA</label>
            <select  class="form-control" name="categoria" id="categoria">
              @foreach($categorias as $cat)
              <option value="{{$cat->codigo}}" {{( $cat->codigo == $produto->codigo_categoria) ? 'selected' : '' }}>{{$cat->descricao}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label for="descricao">QUANTIDADE</label>
            <input class="form-control" type="text" name="quantidade" id="quantidade" value="{{$produto->quantidade}}">
          </div>
        </div>
        <div class="col-sm-12">
          <button class="btn btn-success">SALVAR</button>
        </div>
      </div>
  </form>


@stop