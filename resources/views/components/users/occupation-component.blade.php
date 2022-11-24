<h6 class="text-primary">Occupation</h6>
@foreach($occupation as $name => $value)
    {{ $name }}: <span class="float-right">{{ $value }} </span><br>
@endforeach
