<div>
    @foreach($icons as $key => $value)
        <i class="{{$value[0]}}"></i> - {{$value[1]}} <br>
    @endforeach
</div>
