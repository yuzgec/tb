
{{Form::file($name, ["class" => $class . (($errors->has($name))?" is-invalid":""),'aaccept'=>'image/*'])}}

@if($errors->has($name))
    <div class="invalid-feedback">{{$errors->first($name)}}</div>
@endif
