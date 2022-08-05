<form action="{{route('auth.savePassword')}}" method="post">
    @csrf
    <input type="text" placeholder="password" name="password">
    <button>Update password</button>
</form>
