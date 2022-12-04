@foreach($counters as $name => $value)
    {{ $name }}: <span class="float-right">{{ $value }} </span><br>
@endforeach
