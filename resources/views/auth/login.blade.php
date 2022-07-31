<div>
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>
<form
    action="{{route('auth.postLogin')}}"
    method="post"
>
    @csrf
    <div>
        <label for="">Email</label>
        <input type="text" name="email" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span>{{$errors->first('email')}}</span>
        @endif
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <button>Login</button>
    </div>
</form>
