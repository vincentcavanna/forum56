@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'options' => [['value' => '', 'label' => '']],
    'disabledLabel' => '',
    'attributes' => '',
])
<select class="rounded p-2 m-2 flex-grow" label="{{$label}}" type="{{ $type }}" id="{{ $name }}"
        wire:model={{$name}} {{ $attributes }}>
    @if(isset($disabledLabel))
        <option disabled value="">{{$disabledLabel}}</option>
    @endif
    @foreach($options as $option)
        <option value="{{$option['value']}}">{{$option['label']}}</option>
    @endforeach
</select>