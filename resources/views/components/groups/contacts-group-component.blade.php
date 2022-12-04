@if($isExist)
    @foreach($contacts as $contact)
        ID контакта: <span class="float-right">{{ $entity->getUserId($contact) }} </span><br>
        Должность: <span class="float-right">{{ $entity->getDesk($contact) }} </span><br>
        Телефон: <span class="float-right">{{ $entity->getPhone($contact) }} </span><br>
        email: <span class="float-right">{{ $entity->getEmail($contact) }} </span><br>
    @endforeach
@else
    <span class="float-right">Контакты не определены</span><br>
@endif
