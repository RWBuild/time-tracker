@props(['type' => 'text','name','placeholder' => ''])

<input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
{!! $attributes->merge(['class' => 'form-input']) !!}
>
@error('{{ $name }}')
  <pre class="text-red-500">{{ $message }}</pre>
@enderror