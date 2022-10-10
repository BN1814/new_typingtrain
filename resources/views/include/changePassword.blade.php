<div class="card-body">
    <div class="row mb-3">
        <label for="changePass" class="col-md-4 col-form-label text-end">{{ __('อีเมล : ') }}</label>
        
        <div class="col-md-6">
            <input type="email" class="form-control @error('changePass') is-invalid @enderror" name="changePass">
            @error('changePass')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <button type="submit" class="btn btn-dark">
                {{ __('แก้ไข') }}
            </button>
        </div>
    </div>
</div>
