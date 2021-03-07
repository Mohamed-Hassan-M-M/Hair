<form class="form" id="updateform" action="{{route('admin.account.doEditProfile')}}" method="POST">
    @csrf
    <div class="d-flex flex-row">
        <div class="form-group d-flex flex-row col-md-6">
            <label for="first_name" class="col-md-4 p-2">First Name</label>
            <input type="text" class="form-control text-center col-md-6" value="{{auth()->user()->first_name}}" id="first_name" name="first_name">
        </div>
        <div class="form-group d-flex flex-row col-md-6">
            <label for="last_name" class="col-md-4 p-2">Last Name</label>
            <input type="text" class="form-control text-center col-md-6" value="{{auth()->user()->last_name}}" id="last_name" name="last_name">
        </div>
    </div>
    <div class="d-flex flex-row">
        <div class="form-group d-flex flex-row col-md-6">
            <label for="user_name" class="col-md-4 p-2">Username</label>
            <div class="col-md-6 p-0">
                <input type="text" class="form-control text-center" value="{{auth()->user()->user_name}}" id="user_name" name="user_name">
                <span class="invalid-feedback d-block font-weight-bold" id="user_name_error" style="display:none" role="alert"></span>
            </div>
        </div>
        <div class="form-group d-flex flex-row col-md-6">
            <label for="email" class="col-md-4 p-2">Email</label>
            <div class="col-md-8 p-0">
                <input type="email" class="form-control text-center" value="{{auth()->user()->email}}" id="email" name="email">
                <span class="invalid-feedback d-block font-weight-bold" id="email_error" style="display: none" role="alert"></span>
            </div>
        </div>
    </div>
    <div class="form-group col-md-8 m-auto text-center pt-3">
        <button type="submit" id="updateProfile" class="btn b btn-primary col-md-3">Update</button>
    </div>
</form>
