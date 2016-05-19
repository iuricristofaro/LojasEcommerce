<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Requests\PreApprovals\Request;


class CheckoutController extends Controller
{
    public function place(Order $orderModel, CheckoutService $checkoutService)
    {
        if(!Session::has('cart')){
            return "Não existe sessão";
        }
        $cart = Session::get('cart');

        if($cart->getTotal() > 0){

            $checkout = $checkoutService->createCheckoutBuilder();

            foreach($cart->all() as $k=>$item){

                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'],2,".", ""), $item['qtd']));
            }

            event(new CheckoutEvent());

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::all();
        
        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);
    }

    // public function test(CheckoutService $checkoutService)
    // {
    // 	$checkout = $checkoutService->createCheckoutBuilder()
    //         ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
    //         ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
    //         ->getCheckout();

    //     $response = $checkoutService->checkout($checkout);

    //     return redirect($response->getRedirectionUrl());
    // }
}
