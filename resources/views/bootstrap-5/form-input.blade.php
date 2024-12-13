@if($type === 'hidden') <div class="d-none"> @endif
@if($floating) <div class="mb-3 form-floating"> @endif

    @if(!$floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

    <input
        {!! $attributes->merge(['class' => 'form-control' . ($type === 'color' ? ' form-control-color' : '') . ($hasError($name) ? ' is-invalid' : '')]) !!}
        autocomplete="off"
        type="{{ $type }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {{--  Placeholder is required as of writing  --}}
        @if($floating && !$attributes->get('placeholder'))
            placeholder="&nbsp;"
        @endif
    />

    @if($floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif
        {!! $help ?? null !!}
@if($floating)
            @if($hasErrorAndShow($name))
                <x-form-errors :name="$name" />
            @endif
    </div> @endif



@if(!$floating && $hasErrorAndShow($name))
    <x-form-errors :name="$name" />
@endif

@if($type === 'hidden') </div> @endif
