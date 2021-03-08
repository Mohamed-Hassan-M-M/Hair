<form class="form" action="{{route('admin.account.password.reset')}}" method="POST">
    @csrf
    <div class="row d-flex">
        <div class="form-group d-flex flex-row col-md-8 m-auto">
            <label for="old_password" class="col-md-5 p-2">Old Password</label>
            <div class="col-md-7 p-0">
                <input type="password" class="form-control text-center @if(Session::has('error')) is-invalid @endif " id="old_password" name="old_password" required>
                @if(Session::has('error'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group d-flex flex-row col-md-8 m-auto">
            <label for="new_password" class="col-md-5 p-2">New Password</label>
            <div class="col-md-7 p-0">
                <input type="password" class="form-control text-center @error('password') is-invalid @enderror " id="new_password" name="password" required>
                @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex flex-row col-md-8 m-auto">
            <label for="password_confirmation" class="col-md-5 p-2">Password Confirmation</label>
            <input type="password" class="form-control col-md-7 text-center" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group col-md-8 m-auto text-center pt-3">
            <button id="updatePassword" type="submit" class="btn b btn-primary col-md-3">Change</button>
        </div>
    </div>
</form>
