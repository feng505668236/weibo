<a href="{{route('users.show',$user->id)}}">
    <img src="{{$user->gravatar('120')}}" alt="{{$user->name}}" class="gravatat"/>
</a>
<h1>{{$user->name}}</h1>

