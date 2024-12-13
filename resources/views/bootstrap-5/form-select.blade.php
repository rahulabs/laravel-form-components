@if($floating) <div class="mb-3 form-floating"> @endif

    @if(!$floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

    <select
        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @endif

        name="{{ $name }}"

        @if($multiple)
            multiple
        @endif

        @if($placeholder)
            placeholder="{{ $placeholder }}"
        @endif

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        {!! $attributes->merge(['class' => 'form-select' . ($hasError($name) ? ' is-invalid' : '')]) !!}
    >

        @if($placeholder)
            <option value="" @if($nothingSelected()) selected="selected" @endif>
                {{ $placeholder }}
            </option>
        @endif

        @forelse($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @empty
            {!! $slot !!}
        @endforelse
    </select>
    {!! $help ?? null !!}
    @if($floating)
        <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
    @endif

@if($floating)
        @if($hasErrorAndShow($name))
            <x-form-errors :name="$name" />
        @endif
</div> @endif



@if(!$floating && $hasErrorAndShow($name))
    <x-form-errors :name="$name" />
@endif
