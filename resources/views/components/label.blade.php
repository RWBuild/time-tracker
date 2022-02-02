@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 ml-4']) }}>
				{{ $value ?? $slot }}
</label>
