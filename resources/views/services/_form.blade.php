


<div class="mb-3">
    <label for="name" class="form-label">services nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$service->name ?? '') }}" placeholder="isi nama dengan format yang benar">
        @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description',$service->description ?? '') }}" placeholder="isi deskripsi dengan format yang benar">
        @error('description')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="text" class="form-control"  id="price" name="price" value="{{ old('price',$service->price ?? '') }}" placeholder="isi price dengan benar">
        @error('price')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    </div>
        <div class="mb-3">
        <label for="duration_days" class="form-label">duration_days</label>
        <input type="text" class="form-control"  id="duration_days" name="duration_days" value="{{ old('duration_days',$service->duration_days ?? '') }}" placeholder="isi durasi hari dengan benar">
        @error('duration_days')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

   <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" aria-label="Default select example">
        <option value="">pilih status</option>
        @foreach(['active','inactive'] as $status)
        <option value="{{ $status }}"
         {{ old('status', $service->status ?? "pending") == $status ? 'selected' : '' }}
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
        <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" > <i class="fa-solid fa-circle-down"></i> {{ $buttonText }}</button>
</div>