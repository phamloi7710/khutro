<?php 
    $message = $mail['content'];
    if(isset($user))
    {
       $data = [
          'email'=>$user->email,
          'name'=>$user->name,
          'phone'=>$user->phone,
          'password'=>$password,
       ];
    }
    foreach ($data as $key => $value) {
       $message = str_replace('{{'.$key.'}}', $value, $message);
    }
  ?>
{!!$message!!}