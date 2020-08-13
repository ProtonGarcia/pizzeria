<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;

class ProductClientOrderController extends ApiController
{

    public function store(Request $request, Product $product, User $cliente)
    {

        $rules = [
            'quantity' => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);

        if (!$product->disponibilidad()) {
            return $this->errorResponse('producto no disponible', 409);
        }

        if ($product->quantity < $request->quantity) {
            return $this->errorResponse('El producto no tiene la cantidad requerida para el pedido', 409);
        }

        return DB::transaction(function () use ($request, $product, $cliente) {
            $product->quantity -= $request->quantity;
            $product->save();

            $total =  $request->quantity * $product->price ;
            

            $transaction = Order::create([
                'quantity' => $request->quantity,
                'total' => $total,
                'client_id' => $cliente->id,
                'product_id' => $product->id,
                 
            ]);

            return $this->showOne($transaction,201);
        });
    }
}
