<?php

namespace App\Http\Controllers\Client;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ClientOrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $cliente)
    {
        $ordenes = $cliente->orders;

        return $this->showAll($ordenes);
    }

}
