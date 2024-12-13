<div {!! $attributes->merge(['class' => ($hasError($name) ? 'is-invalid mb-4' : 'mb-4')]) !!}>
    <x-form-label :label="$label" :icon1="$attributes->get('icon1') ?? null" :icon2="$attributes->get('icon2') ?? null"/>

    <div class="w-fit @if($inline) d-flex flex-row flex-wrap inline-space @endif">
        {!! $slot !!}
    </div>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" class="d-block" />
    @endif
</div>
