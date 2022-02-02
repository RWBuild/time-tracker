@props(['name','cols'=> '30','rows' => '3','value'=> ''])

<textarea class="form-input" name="{{ $name }}"  cols="{{ $cols }}" rows="{{ $rows }}">
    {{ $value }}
</textarea>