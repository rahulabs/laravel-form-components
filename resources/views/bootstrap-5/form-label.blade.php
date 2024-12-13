@if($label)
    @if($attributes->get('icon1') ?? null || $attributes->get('icon2') ?? null)
        <div class="d-inline-flex align-items-center w-100 justify-content-between gap-5">
            <label {!! $attributes !!} class="form-label">{!! $label !!}</label>
            <div class="tool_icons d-flex gap-3">
                @if($attributes->get('icon1') ?? null)
                    <button type="button" data-bs-html="true" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-title="{!! $attributes->get('icon1') !!}" data-bs-custom-class="custom-tooltip">i</button>
                @endif
                @if($attributes->get('icon2') ?? null)
                    <button type="button" data-bs-html="true" data-bs-toggle="tooltip" data-bs-title="{!! $attributes->get('icon2') !!}" class="btn btn-sm btn-danger" data-bs-custom-class="custom-tooltip">§</button>
                @endif
            </div>
        </div>
    @else
        <label {!! $attributes !!} class="form-label">{!! $label !!}</label>
    @endif
@endif
