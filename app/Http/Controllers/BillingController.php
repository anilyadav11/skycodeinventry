<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\product;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\CustomerType;
use App\Models\product_pricing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $customers = Customer::all();
        $products = Product::all();
        $customerTypes  = CustomerType::all();
        $productPricing = product_pricing::all();
        return view('billing.form', compact('customers', 'products', 'customerTypes', 'productPricing'), ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'unit_types' => 'required|array',
            'prices' => 'required|array',
            'quantities' => 'required|array',
            'totals' => 'required|array',
            'total_amount' => 'required|numeric',
            'payment_status' => 'required|in:pending,paid',
        ]);

        // Create Order
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);

        // Create Order Items
        foreach ($request->products as $index => $productId) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'unit_type' => $request->unit_types[$index],
                'price' => $request->prices[$index],
                'quantity' => $request->quantities[$index],
                'total' => $request->totals[$index],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function getPricingOptions($productId)
    {
        $productPricings = product_pricing::where('product_id', $productId)->get();
        return response()->json($productPricings);
    }

    // Fetch price based on selected options
    // public function getPrice($productId, $type, $unitType, $customerType)
    // {
    //     $pricing = product_pricing::where([
    //         ['product_id', '=', $productId],
    //         ['type', '=', $type],
    //         ['unit_type', '=', $unitType],
    //         ['customer_type', '=', $customerType]
    //     ])->first();

    //     return response()->json(['price' => $pricing ? $pricing->price : 0]);
    // }





    // public function getCustomerTypes($productId)
    // {

    //     $customerTypes = DB::table('product_pricings')
    //         ->where('product_id', $productId)
    //         ->pluck('customer_type')
    //         ->unique();

    //     return response()->json($customerTypes);
    // }

    public function getPrice($productId, $type, $unitType, $customerType)
    {
        // Fetch the price based on the selected product, type, unit type, and customer type
        $price = DB::table('product_pricings')
            ->where([
                ['product_id', $productId],
                ['type', $type],
                ['unit_type', $unitType],
                ['customer_type', $customerType],
            ])
            ->value('price');

        return response()->json(['price' => $price]);
    }
}
