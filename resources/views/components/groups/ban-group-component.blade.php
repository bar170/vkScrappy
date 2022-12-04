@if($isExist)
    Ваш статус в сообществе: <span class="float-right">{{ $isBan }} </span><br>
    Длительность бана: <span class="float-right">{{ $dateEndBan }} </span><br>
    Комментарий к бану: <span class="float-right">{{ $commentBan }} </span><br>
@else
    <span class="float-right">{{ $isBan }} </span><br>
@endif
