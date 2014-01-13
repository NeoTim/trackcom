@foreach ($entries as $entry)
<li>
    <div class="col-md-2 col-xs-2">
        {{$entry->sku}}
    </div>
    <div class="col-md-8 col-xs-8">        
        <div class="progress progress-striped">
            <div style="width:{{$entry->status}}%;" class="progress-bar progress-bar-{{$entry->color}}" aria-valuenow="{{$entry->status}}" aria-valuemin="0" aria-valuemax="100">
                <span class="sr-only"> {{$entry->status}}% Complete</span>
            </div>
        </div>
    </div>
    <div class="col-md-1 col-xs-1">
        <span class="percent pull-right">{{$entry->status}}%</span>
    </div>
</li>
@endforeach