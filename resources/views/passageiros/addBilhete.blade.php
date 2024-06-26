@extends('layouts.mainLayout')

@push('css')
<link rel="stylesheet" href="{{ URL::asset('css/addBilhete.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('css/modalPassageiro.css') }}">
@endpush

@section('pageTitle', 'Adicionar Bilhetes')

@section('title','Adicionar Bilhetes')

@section('content')
<div class="h-100 w-100 align-items-center d-flex flex-column">
    <div class="d-flex justify-content-between px-2 py-2 ">
        
        
    </div>
    <hr style="border: 0.1px solid gray" class="my-3">

    <form class="row justify-content-around mt-5 w-100" action="{{ route('passageiros.bilhetes.store', $idUsuario['id'] ) }}"  style="" method="POST">
        @csrf
        <div class="col-4 d-flex  flex-column gap-4 justify-content-center align-items-center mt-3" style="border-right: 2px solid black">
            <label for="foto" id="lbFoto">
            <img id="preview"
                src="{{ url('images/bilheteFoto.png') }}" name="fotoBilhete" style="width:300px; border-radius: 25px" alt="">
            </label>
    </div>
    <div class="col-7 d-flex row h-100 justify-content-center align-items-center"> 
        <div class="justify-content-center d-flex flex-row align-items-center ">
            <label for="tipoBilhete" class="text-center px-3" style="border-right: 1px solid black">Tipo</label>
            <select id="tipoBilhete" class="form-control ms-2" name="tipoBilhete" style="border-bottom: 1px solid black">
                <option value="Estudante">Estudante</option>
                <option value="Idoso">Idoso</option>
                <option value="Professor">Professor</option>
                <option value="Comum">Comum</option>
                <option value="Pcd">Pessoa com Deficiência</option>
                <option value="Obesa">Pessoa Obesa</option>
                <option value="Gestante">Gestante</option>
                <option value="Corporativo">Corporativo</option>
            </select>
        </div>
        <div class="w-100 d-flex align-items-center gap-2  ">
            <label for="status" style="width: 30%;border-right: 1px solid black" class=" text-center">Status</label>
            <select id="status" class="form-control" name="status" style="width:60%;border-bottom: 1px solid black">
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </select>
        </div>
    </div>
    </form>
    <img src="http://api.qrserver.com/v1/create-qr-code/?size=200x200&data=Cuzinho" alt=""  id="qrCode" style="padding: 500px">

    <div>
        @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{$error}}</li>
            @endforeach
        </ul>
    @endif
        

    </div>



</div>
<script src="{{ asset('js/qrCode.js') }}"></script>
@endsection