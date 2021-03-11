@if(Session::has('error'))
    <div class="row mr-2 ml-2" onclick="">
            <alert type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    style="cursor: default" id="type-error">{{Session::get('error')}}
            </alert>
    </div>
@endif
