<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
class BaseController extends Controller
{
    public function allsales()
    {
        // $data = Customer::find(1);
        $data = Customer::findOrFail(1);
        // dd($data);
        return view('allsales')->with('data',$data);
    }
    public function index()
    {
        $data = array(
            'products' => Product::all() ,
            'customers' => Customer::all() ,
        );
        return view('sales')->with($data);
    }

    public function sales(Request $request)
    {
        $this->validate($request,[
            'customer' => 'required',
            'product' => 'required',
        ]);

            // dd($request->all());
        $customer = Customer::find($request['customer']);
        $customer->products()->attach($request['product']);

        return redirect('/sales')->with('message','Product Sold Successfully');
    }

    public function viewProducts()
    {
        return view('addProducts');
    }

    public function viewAllProducts()
    {
        $allProducts = Product::latest()->get();
        return view('allProducts')->with('allProducts',$allProducts);
    }

    public function addProduct(Request $request)
    {
        //
        $this->validate($request,[
            'product_name' => 'required|string',
            'product_price' => 'required|integer',
        ]);

        $product = new Product();
        $product->product_name = $request['product_name'];
        $product->product_price = $request['product_price'];
        $product->save();

        return redirect('/allproducts')->with('message','Product Added Successfully');
    }

    public function viewCustomers()
    {
        return view('addCustomers');
    }

    public function viewAllCustomers()
    {
        $allCustomers = Customer::latest()->get();
        return view('allCustomers')->with('allCustomers',$allCustomers);
    }

    public function addCustomer(Request $request)
    {
        //
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:customers',
        ]);

        $customer = new Customer();
        $customer->first_name = $request['first_name'];
        $customer->last_name = $request['last_name'];
        $customer->email = $request['email'];
        $customer->save();

        return redirect('/allcustomers')->with('message','Customer Added Successfully');
    }

}
