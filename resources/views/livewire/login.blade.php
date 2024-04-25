
<div>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card">

                <!-- Logo -->
                <div class="card-header py-3 text-center bg-dark">
                    {{-- <a href="{{ route('login') }}"> --}}
                        <span><img src="{{ asset(AppConst::ASSET_LOGO) }}" alt="logo" height="50"></span>
                    {{-- </a> --}}
                </div>

                <div class="card-body p-4">

                    <div class="text-center w-75 m-auto">
                        <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access Agent panel.</p>
                    </div>

                    <form wire:submit="login">

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" type="email" id="emailaddress" required=""
                                placeholder="Enter your email" wire:model.defer="email">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control"
                                    placeholder="Enter your password" wire:model.defer="password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="mb-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        @error('invalid-credentials')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <div class="mb-3 mb-0 text-center">
                            <button class="btn btn-dark w-100" type="submit"> Log In</button>
                        </div>

                    </form>
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->



        </div>
    </div>

</div>
