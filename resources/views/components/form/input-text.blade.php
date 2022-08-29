<div class="form-group mb-3 row">
    <label class="form-label col-{{$column}} col-form-label">{{$label}}</label>
    <div class="col">
        {{Form::text($name, null, ["class" => $class . (($errors->has($name))?" is-invalid":"")])}}
        @if($errors->has($name))
            <div class="invalid-feedback" style="display: block">{{$errors->first($name)}}</div>
        @endif
    </div>
</div>
