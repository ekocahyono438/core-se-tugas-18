<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderLog;

class OrderServices
{
    public function createOrder(Customer $customer, array $data): Order
    {
        return DB::transaction(function () use ($customer, $data) {

            // Cek apakah order_number sudah dipakai; jika sudah ada, generate nomor berikutnya otomatis
            if (Order::where('order_number', $data['order_number'])->exists()) {
                $lastOrder = Order::lockForUpdate()->latest('id')->first();
                $nextNumber = $lastOrder ? ((int) $lastOrder->order_number) + 1 : 1;
                $data['order_number'] = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            }

            $data['status'] = Order::requiresApproval(
                (float) $data['total']
            ) ? 'pending' : 'approved';

            $data['approved_by'] = null;
            $data['approved_at'] = null;

            // Simpan Order
            $order = $customer->orders()->create($data);

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