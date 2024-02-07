<?php

namespace App\Repositories\Eloquent;

use App\Models\Suporte;
use App\Repositories\Contracts\SuporteRepositoryInterface;

class SuporteRepository extends AbstractRepository implements SuporteRepositoryInterface
{
    protected $model = Suporte::class;
    public function __construct()
    {
        $this->model = app($this->model);
    }
    public function all($status, $search)
    {
        if($status == null){
            $status = 'Aberto';
        }
        
          return  $this->model
                ->select('suportes.id as idSuporte','emailPassageiro as email', 'descSuporte as desc', 'dataAcao as data', 'categoriaSuporte as tema', 'statusSuporte as status' )
                ->join('acaos', 'suportes.acao_id', 'acaos.id')
                ->join('passageiros', 'acaos.passageiro_id', 'passageiros.id')
                ->where(function($query) use ($search, $status){
                        if($search == null){
                            $query->where('statusSuporte', "$status");
                        }else{
                            $query->where('emailPassageiro','LIKE',"%{$search}%");
                            $query->orWhere('descSuporte','LIKE',"%{$search}%");
                            $query->orWhere('dataAcao','LIKE',"%{$search}%");
                        }
                })
                ->get();
         
    }

    public function findWithPassageiro($id)
    {
        return $this->model
                    ->join('acaos', 'suportes.acao_id', 'acaos.id')
                    ->join('passageiros', 'acaos.passageiro_id', 'passageiros.id')
                    ->where('suportes.id', '=', "$id")
                    ->get();
    }

    public function updateStatus($id, $status)
    {
        $suporte = $this->findById($id);
        $suporte->update([
            'statusSuporte' => $status
        ]);
    }
    public function allHome(){
        return $this->model->all()->count();
    }
}