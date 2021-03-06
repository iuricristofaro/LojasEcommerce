<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\User;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['is_admin'] = $request->get('is_admin') ? true : false;
        $this->orderModel->find($id)->update($input);
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
       $this->orderModel->find($id)->delete();
        return redirect()->route('admin.orders.index');
    }
}
