<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\checkout;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart ;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts  = Cart::content()->toArray();
        $total = Cart::total();
        return view('Englishchallenger.checkout', ['carts'=>$carts,'total' =>$total]);
    }

    public function order(){
        return view('EnglishChallenger.order-received');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'billing_first_name' => 'required|string|max:255',
        //     'billing_last_name' => 'required|string|max:255',
        //     'billing_country' => 'required|string|max:255',
        //     'billing_address_1' => 'required|string|max:255',
        //     'billing_city' => 'required|string|max:255',
        //     'billing_phone' => 'required|string|max:20',
        //     'billing_email' => 'required|string|email|max:255',
        //     // 'order_comments' => 'nullable|string',
        //     'cart_id' => 'required|integer',
        //     // 'user_id' => 'required|integer',
        //     // 'payment_method' => ['required', Rule::in(['bacs', 'cheque', 'cod', 'paypal'])], // Payment method must be one of these options


        // ]);
        $checkout = new checkout([
            'billing_first_name'=>$request->get('billing_first_name'),
            'billing_last_name'=>$request->get('billing_last_name'),
            'billing_company'=>$request->get('billing_company'),
            'billing_country'=>$request->get('billing_country'),
            'billing_address_1'=>$request->get('billing_address_1'),
            'billing_address_2'=>$request->get('billing_adress_2'),
            'billing_city'=>$request->get('billing_city'),
            'billing_state'=>$request->get('billing_state'),
            'billing_postcode'=>$request->get('billing_postcode'),
            'billing_phone'=>$request->get('billing_phone'),
            'billing_email'=>$request->get('billing_email'),
            'order_comments'=> $request->get('order_comments'),
            // 'total_amount'=>$request->get('total_amount'),
            // 'cart_id'=>$request->get('cart_id'),
            'teacher_id'=>$request->get('teacher_id'),
            'student_id'=>$request->get('student_id'),
            'parent_id'=>$request->get('parent_id'),
            'school_id'=>$request->get('school_id'),
            'payment_method'=>$request->get('payment_method'),
        ]);
        // dd($checkout);
        $checkout ->save();
        return redirect()->route('order.order-received');
    }
    /**
     * Display the specified resource.
     */
    public function show(checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
