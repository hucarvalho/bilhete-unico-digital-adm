<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePassageiroFormRequest;
use App\Repositories\Contracts\BilheteRepositoryInterface;
use App\Repositories\Contracts\PassageiroRepositoryInterface;
use App\Services\DataServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassageiroController extends Controller
{
    protected $model;
    public function __construct(PassageiroRepositoryInterface $passageiro)
    {
        $this->model = $passageiro;
    }
    public function passageiroIndex(Request $request)
    {
        
        $passageiros = $this->model->search($request->search, null);
        $user = Auth::guard('adm')->user();

        return view('passageiros.index', compact('passageiros', 'user'));

    }
    public function form()
    {
        $user = Auth::guard('adm')->user();
        return view('passageiros.form', compact('user'));
    }

    public function updatePassagens(Request $request, BilheteRepositoryInterface $bilheteModel)
    {
        // dd($request);
        if ($request->qtdPassagemRemove == 0) 
        {
            return redirect()->back();
        } 
        $qtd = $request->qtdPassagemAnterior - $request->qtdPassagemRemove;
        $bilhete = $bilheteModel->findById($request->idBilhete);
        $bilheteModel->removePassagens($qtd, $bilhete);
        return redirect()->back();
        
    }
    public function storePassagens(Request $request, BilheteRepositoryInterface $bilheteModel) 
    {

        if($request->qtdPassagemAdiciona == 0 ){
            return redirect()->back();
        }
        $bilhete = $bilheteModel->findById($request->idBilhete);
        $qtd = $request->qtdPassagemAdiciona-$request->qtdPassagemAnterior;
        $bilheteModel->adicionarPassagens($qtd, $bilhete);
        return redirect()->back();

    }

    public function addBilhete($id) 
    {
        $services = new DataServices();
        $idUsuario['id'] = $id;
        
        
        $user = Auth::guard('adm')->user();
        
        return view('passageiros.addBilhete', compact('idUsuario', 'user'));

    }
    public function bilheteStore($id, BilheteRepositoryInterface $bilheteModel, Request $request, DataServices $dataServices) 
    {
        
        
        $data = $dataServices->resolveBeneficios($request->tipoBilhete, $id);
        $newBilhete = $bilheteModel->create($data);
        $qrCode = $dataServices->qrCodeFetch($newBilhete->id);
        $data['qrCodeBilhete'] = $qrCode;
        $bilheteModel->update($newBilhete->id, $data);

        return redirect()->route('perfilPassageiro.index', $id);
    }

    public function store(StoreUpdatePassageiroFormRequest $request)
    {
        $data = $request->all();
        if($request->password){
        $data['password'] = bcrypt($data['password']);
        }
        if($request->fotoPassageiro){
            $data['fotoPassageiro'] = $request->fotoPassageiro->store('passageiros');
        }
        $data['nomePassageiro'] = $data['nomePassageiro']." ".$data['sobreNomePassageiro'];
        $this->model->create($data);

        return response()->json([
            'status' => 'success'
        ]);
    }
    public function perfilPassageiro($id, BilheteRepositoryInterface $bilheteModel, DataServices $dataServices) 
    {

        $passageiro = $this->model->findWithAcoes($id);
        $bilhetes = $passageiro[0]->bilhetes;
        $acoes = $passageiro[0]->acaos;
        $acoesCompra = $acoes->where('tipoAcao', 'Compra')->count();
        $totalSuporte = $this->model->getSuporte($id)->count();
        $passageiro = $passageiro[0];
        $passagens = $bilheteModel->getPassagensAtivas($id);
        $passagensInativas = $bilheteModel->getAllConsumos($id);

        $bilhetes = $dataServices->resolvePassagens($bilhetes, $passagens);

        $dataNasc = explode("-",$passageiro->dataNascPassageiro);
        $dataNasc = $dataNasc[2]."/".$dataNasc[1]."/".$dataNasc[0];

        $passageiro->dataNascPassageiro = $dataNasc;

        for($i=0;$i<count($acoes);$i++) {
            $data[$i] = $acoes[$i]->dataAcao;
            $separa = explode(" ", $data[$i]);
            $linha = explode("-", $separa[0]);
            $acoes[$i]->dataAcao = $linha[2]."/".$linha[1]."/".$linha[0];
        }

        $user = Auth::guard('adm')->user();
        return view('passageiros.perfil', compact('passageiro', 'bilhetes', 'acoes', 'passagens', 'user', 'passagensInativas', 'acoesCompra', 'totalSuporte'));
    }

    public function search(Request $request)
    {
        if(isset($request->status)){
            $status = $request->status;
        }else{
            $status = null;
        }
        $passageiros = $this->model->search($request->search, $status);
        
        if($passageiros->count() >= 1){
           
            return view('passageiros.partials.passageiros_result', compact('passageiros'))->render();
        }else{
            return view('components.no_results')->with('palavra', $request->search)->render();
        }
    }

}


