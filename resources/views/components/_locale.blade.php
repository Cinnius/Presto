<form action="{{route('set_language_locale', $lang)}}" method="POST">
@csrf
<button type="submit" >
        <span class="flag-icon flag-icon-{{$nation}}"></span>
</button>
</form>
