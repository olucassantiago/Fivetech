@foreach($produtos as $produto)
    <p>Nome: {{$produto->nome}}</p>
    <p>Descrição: {{$produto->descricao}}</p>
    <p>Preço: {{$produto->preco}}</p>
    <hr>
@endforeach