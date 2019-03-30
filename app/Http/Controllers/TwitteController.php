<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TwitteRepository;

class TwitteController extends Controller
{
    private $twitte;

    public function __construct()
    {
        $this->twitte = new TwitteRepository();
    }

    //Chama método da repository para salvar twittes no banco
    public function index()
    {
        return $this->twitte->index();
    }

    //Chama método da repository para filtro
    //Retorne todos os tweets que tenham sido criados de 7 dias antes da data do
    //seu teste até 2 dias antes da data do seu teste, em ordem dos mais recentes aos
    //mais antigos.
    public function beforeSevenDays($order = null, $order_by = null)
    {
        return $this->twitte->beforeSevenDays($order, $order_by);
    }

    //Chama método da repository para filtro
    // Retorne todos os tweets que possuam mais de 3000 likes mas menos de 2500RTs.
    public function moreThan3000lessThan2500($order = null, $order_by = null)
    {
        return $this->twitte->moreThan3000lessThan2500($order, $order_by);
    }

    //Chama método da repository para filtro
    // Retorne o content do tweet com mais RTs
    public function moreRT($order = null, $order_by = null)
    {
        return $this->twitte->moreRT($order, $order_by);
    }

    //Chama método da repository para filtro
    // Retorne todas as localidades únicas dos tweets que estejam disponíveis na
    //sua extração. Se houverem tweets sem localização, o termo "Sem Localização" é o
    //termo que deve ser retornado.
    public function locale($order = null, $order_by = null)
    {
        return $this->twitte->locale($order, $order_by);
    }
}
