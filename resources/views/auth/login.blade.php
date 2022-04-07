<p>Login view WE16201</p>
<!-- Form login gom 2 input email va password, 1 nut submit -->
<form action="{{route('auth.post-login')}}" method="post">
    @csrf
    <input type='email' name="email" />
    <input type='password' name="password" />
    <input type='submit' value='Submit' />
</form>
