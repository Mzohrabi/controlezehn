{{Form::open(['url' => route('login'), 'method' => 'post'])}}
    @csrf
    <h1>{{trans("login.title")}}</h1>
    <div>
        {{Form::text("mobile",
            old("mobile") ? old("mobile"):(!empty($user) ? $user->mobile : null),
            [
                "class" => "form-control",
                "placeholder" => trans("login.username")
            ])}}
    </div>
    <div>
        {{Form::password("password",
            [
                "class" => "form-control",
                "placeholder" => trans("login.password")
            ])}}
    </div>
    <div>
        {{Form::button(trans("login.submit"), ["type" => "submit", "class" => "btn btn-default btn-block submit"])}}
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <div class="clearfix"></div>
        <br />

        <div>
            <h1>ControleZehn <i class="fa fa-book"></i></h1>
            <p>©1399 تمامی حقوق سایت محفوظ گروه کنترل ذهن</p>
        </div>
    </div>
</form>
