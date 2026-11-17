<?php


namespace App\Services;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderLog;


class OrderServices{
    public function createOrder(Customer $customer, array $data): Order
    {
        return DB::transaction(function () use ($customer, $data) {

            $data['status'] = Order::requiresApproval(
                (float) $data['total']
            ) ? 'pending' : 'approved';

            $data['approved_by'] = null;
            $data['approved_at'] = null;

            // Simpan Order
            $order = $customer->orders()->create($data);

            // Simulasi kegagalan
            //throw new \RuntimeException('Simulated order creation failure');

            // Simpan Order Log
            OrderLog::create([
                'order_id' => $order->id,
                'actifity' => 'Order created',
                'performed_by' => Auth::id(),
            ]);

            return $order;
        });
    }
}