


@props(['disabled' => false,])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['name' => 'name','placeholder'=>'placeholder','type' => 'submit','class' => 'rounded-md shadow-sm border-gray-300 m-2 focus:border-indigo-300 
focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>


