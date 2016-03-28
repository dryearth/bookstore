

<div class="btn-toolbar" role="toolbar">

    @if (isset($label))
    <div class="pull-left">
        <h2>{!! $label !!}</h2>
    </div>
    @endif
    @if (isset($buttons_left) && count($buttons_left))
    <div class="pull-left">
        @foreach ($buttons_left as $button) {!! $button !!}
        @endforeach
    </div>
    @endif
</div>
 <br />
