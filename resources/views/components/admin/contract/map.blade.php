<div class="card map-card">
    <div class="card-title text-center">
        <button type="button" onclick="deleteAddress(this)" class="btn btn-sm btn-danger">{{trans('admin/contracts/index.create.buttons.delete_address')}}</button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @component('components.inputs.textarea', ['name' => 'address[]'])
                    @slot('title')
                        {{trans('admin/general.contract.address')}}
                    @endslot
                    @slot('value')
                        {{ $address ?? '' }}
                    @endslot
                @endcomponent
                @component('components.inputs.textbox', ['name' => 'mobile[]'])
                    @slot('title')
                        {{trans('admin/general.contract.mobile')}}
                    @endslot
                    @slot('value')
                        {{ $mobile ?? ''}}
                    @endslot
                @endcomponent
                <input type="hidden" value="{{$lat ?? ''}}" id="{{$map_id}}_lat" name="lat[]" />
                <input type="hidden" value="{{$lng ?? ''}}" id="{{$map_id}}_lng" name="lng[]" />
                <input type="hidden" value="{{$address_id ?? ''}}" name="address_id[]" />
            </div>
        </div>
        <div id="{{$map_id}}" class="gmaps"></div>
    </div>
</div>
@if(($partial ?? '') == true)
    <script>
        $(document).ready(function(){
            let map = new GMaps({
                el: '#{{$map_id}}',
                lat: 29.578489641039546,
                lng: 52.528441489169055,
                click: function(e) {
                    $("#{{$map_id}}_lat").attr('value', e.latLng.lat())
                    $("#{{$map_id}}_lng").attr('value', e.latLng.lng())
                    map.removeMarker(marker)
                    marker = map.addMarker({
                        lat: e.latLng.lat(),
                        lng: e.latLng.lng(),
                        title: 'آدرس'
                    });
                }
            });
            let marker = null;
            @if(($lat ?? '') != null)
                marker = map.addMarker({
                lat: {{$lat}},
                lng: {{$lng}},
                title: 'Marker with InfoWindow',
            });
            @endif
        });
    </script>
@endif
@push('custom-scripts')
<script>
    $(document).ready(function(){
        let map = new GMaps({
            el: '#{{$map_id}}',
            lat: 29.578489641039546,
            lng: 52.528441489169055,
            click: function(e) {
                $("#{{$map_id}}_lat").attr('value', e.latLng.lat())
                $("#{{$map_id}}_lng").attr('value', e.latLng.lng())
                map.removeMarker(marker)
                marker = map.addMarker({
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng(),
                    title: 'آدرس'
                });
            }
        });
        let marker = null;
        @if(($lat ?? '') != null)
        marker = map.addMarker({
            lat: {{$lat}},
            lng: {{$lng}},
            title: 'Marker with InfoWindow',
        });
        @endif
    });
</script>
@endpush
