<div class="form-group mb-3 row">
    <label class="form-label col-{{$column}} col-form-label">{{$label}}</label>
    <div class="col">
        {{Form::password($name, null, ["class" => $class . (($errors->has($name))?" is-invalid":"")])}}
    </div>
</div>
@if($errors->has($name))
    <div class="invalid-feedback">{{$errors->first($name)}}</div>
@endif
