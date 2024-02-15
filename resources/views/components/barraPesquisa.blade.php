
<form
@if(isset($passageiros))

@elseif(isset($adms))


@elseif(isset($linhas))
action="{{route('linhas.index')}}"
@elseif(isset($suportes))
action="{{route('caixaEntrada.index')}}"
@endif
method="get" class="d-flex flex-row">
    @csrf
    
    <input type="text" placeholder="Pesquisa" name="search" class="form-control border border-danger rounded-5"
    @if(isset($passageiros))
            id="passageiroSearch"
    @elseif(isset($adms))
            id="admSearch"
    @elseif(isset($linhas))
        id="linhaSearch"
    @elseif(isset($suportes))
        action="{{route('caixaEntrada.index')}}"
    @endif
    
    >
    <button type="submit" style="background: none; border:none;font-size:22px"><i style="color: #000" class="fa-solid fa-magnifying-glass"></i></button>    
</form>


{{-- para incluir a barra de pesquisa basta abrir uma @section('pesquisa') e dar include nesse componente --}}