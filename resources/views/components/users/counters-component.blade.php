<h6 class="text-primary">Счетчики</h6>
@foreach($counters as $name => $value)
    {{ $name }}: <span class="float-right">{{ $value }} </span><br>
@endforeach
