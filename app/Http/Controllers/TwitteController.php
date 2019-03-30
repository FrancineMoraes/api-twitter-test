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
}
