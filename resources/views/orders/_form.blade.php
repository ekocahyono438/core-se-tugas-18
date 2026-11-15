

<div class="mb-3">
    <label for="customer_id" class="form-label">Customer nama</label>
    <select name="customer_id" id="customer_id" class="form-select" aria-label="Default select example">
        <option value="">pilih order</option>
        @foreach($customers as $customer)
        <option value="{{ $customer->id}}"
         {{ old('customer_id', $orders->customer_id ?? "") == $customer->id ? 'selected' : ''}}
        >
         {{ $customer->name }} 
        </option>

       @endforeach
    </select>
        @error('customer_id')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="text" class="form-control" id="order_number" name="order_number" value="{{ old('order_number',$orders->order_number ?? '') }}" >
        @error('order_number')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="order_date" class="form-label">Order Data</label>
        <input type="date" class="form-control"  id="order_date" name="order_date" value="{{ old('order_date',$orders->order_date ?? '') }}">
        @error('order_date')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="number" class="form-control"  id="total" name="total" value="{{ old('total',$orders->total ?? '') }}">
        @error('total')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" aria-label="Default select example">
        <option value="">pilih status</option>
        @foreach(['pending','prosesing','completed','cenceled'] as $status)
        <option value="{{ $status }}"
         {{ old('status', $order->status ?? "pending") == $status ? 'selected' : '' }}
        >
         {{ $status }} 
        </option>

       @endforeach
    </select>
        @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    

   