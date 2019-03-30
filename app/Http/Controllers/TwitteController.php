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

    public function index()
    {
        return $this->twitte->index();
    }

    public function beforeSevenDays($order = null, $order_by = null)
    {
        return $this->twitte->beforeSevenDays($order, $order_by);
    }

    public function moreThan3000lessThan2500($order = null, $order_by = null)
    {
        return $this->twitte->moreThan3000lessThan2500($order, $order_by);
    }

    public function moreRT($order = null, $order_by = null)
    {
        return $this->twitte->moreRT($order, $order_by);
    }

    public function locale($order = null, $order_by = null)
    {
        return $this->twitte->locale($order, $order_by);
    }
}
