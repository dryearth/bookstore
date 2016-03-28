@if (in_array("show", $actions))
    <a class="" title="@lang('rapyd::rapyd.show')" href="{!! url('panel/'.$current_entity.'/'.$uri) !!}?show={!! $id !!}"><span class="ic-globe"> </span></a>
@endif
@if (in_array("modify", $actions))
    <a class="" title="@lang('rapyd::rapyd.modify')" href="{!! url('panel/'.$current_entity.'/'.$uri) !!}?modify={!! $id !!}"><span class="fa fa-edit"> </span></a>
@endif
@if (in_array("delete", $actions))
    <a class="text-danger" title="@lang('rapyd::rapyd.delete')" href="{!! url('panel/'.$current_entity.'/'.$uri) !!}?delete={!! $id !!}"><span class="glyphicon glyphicon-trash"> </span></a>
@endif
