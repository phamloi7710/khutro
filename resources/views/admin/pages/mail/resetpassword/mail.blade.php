@if(isset($token))
<div style="text-align: center; color: #fff;">
    <a href="{{route('getResetPassFrontend',['token'=>$token])}}" class="btn btn-primary" style="text-align: center;">Reset Password</a>
</div>
@endif