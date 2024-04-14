@props([
    'attributes' => '',
    'model' => '',
    'label' => '',
    'required' => false
])

<div class="flex flex-grow flex-col m-2">
    <x-label class="text-sm font-semibold" for="{{$required ? $label . ' *' : $label}}"/>
    <x-input label="{{$label}}" class="border-gray-light border-2 rounded p-2 my-1"
             {{$attributes}} wire:model="{{$model}}"/>
    @error($model)
    <p class="text-error">{{$message}}</p>
    @enderror
</div>