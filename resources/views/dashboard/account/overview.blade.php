<div class="row d-flex flex-row">
    <div class="form-group d-flex flex-row col-md-6">
        <label for="first_name" class="col-md-4 p-2">First Name</label>
        <p class="form-control col-md-6 text-center text-truncate" id="first_name" name="first_name">{{auth()->user()->first_name}}</p>
    </div>
    <div class="form-group d-flex flex-row col-md-6">
        <label for="last_name" class="col-md-4 p-2">Last Name</label>
        <p class="form-control col-md-6 text-center text-truncate" id="last_name" name="last_name">{{auth()->user()->last_name}}</p>
    </div>
</div>
<div class="row d-flex flex-row">
    <div class="form-group d-flex flex-row col-md-6">
        <label for="user_name" class="col-md-4 p-2">Username</label>
        <p class="form-control col-md-6 text-center text-truncate" id="user_name" name="user_name">{{auth()->user()->user_name}}</p>
    </div>
    <div class="form-group d-flex flex-row col-md-6">
        <label for="email" class="col-md-4 p-2">Email</label>
        <p class="form-control col-md-8 text-center text-truncate" id="email" name="email">{{auth()->user()->email}}</p>
    </div>
</div>
