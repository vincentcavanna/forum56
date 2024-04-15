@props([
    'attributes' => '',
    'model' => '',
    'label' => '',
    'required' => false
])

<div class="flex flex-grow flex-col p-2">
    <div>
        <x-label class="text-sm font-semibold" for="{{$label}}"/>
        @if($required)
            <p class="inline text-error">*</p>
        @endif
    </div>
    <x-input label="{{$label}}" class="border-gray-light border-2 rounded p-2"
             {{$attributes}} wire:model="{{$model}}"/>
    @error($model)
    <p class="text-error">{{$message}}</p>
    @enderror
</div>