@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'options' => [['value' => '', 'label' => '']],
    'disabledLabel' => '',
    'attributes' => '',
    'required' => false
])
<div class="flex flex-grow flex-col p-2">
    <div>
        <x-label class="text-sm font-semibold" for="{{$label}}"/>
        @if($required)
            <p class="inline text-error">*</p>
        @endif
    </div>
    <select class="rounded flex-grow h-12 px-2" label="{{$label}}" type="{{ $type }}" id="{{ $name }}"
            wire:model={{$name}} {{ $attributes }}>
        @if(isset($disabledLabel))
            <option disabled value="">{{$disabledLabel}}</option>
        @endif
        @foreach($options as $option)
            <option value="{{$option['value']}}">{{$option['label']}}</option>
        @endforeach
    </select>
</div>