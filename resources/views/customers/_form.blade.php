


<div class="mb-3">
    <label for="name" class="form-label">Customer nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$customer->name ?? '') }}">
        @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="email" class="form-label">Customer email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$customer->email ?? '') }}" placeholder="isi email dengan format yang benar">
        @error('email')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control"  id="city" name="city" value="{{ old('city',$customer->city ?? '') }}" placeholder="isi kota dengan benar">
        @error('city')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" > <i class="fa-solid fa-circle-down"></i> {{ $buttonText }}</button>
</div>