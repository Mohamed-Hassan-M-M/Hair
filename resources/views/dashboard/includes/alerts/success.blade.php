@if(Session::has('success'))
    <div class="row mr-2 ml-2" onclick="">
            <alert type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                   style="cursor: default" id="type-error">{{Session::get('success')}}
            </alert>
    </div>
@endif
