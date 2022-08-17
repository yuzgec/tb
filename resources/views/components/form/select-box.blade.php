<div class="form-group mb-3 row">
    <label class="form-label col-3 col-form-label">{{$label}} </label>
    <div class="col">
        {{Form::select($name, $list, $selected, ["class" => $class . (($errors->has($name))?" is-invalid":""),"placeholder" => $placeholder, "multiple" => $multiple])}}
    </div>
</div>
@if($errors->has($name))
    <div class="invalid-feedback">{{$errors->first($name)}}</div>
@endif
