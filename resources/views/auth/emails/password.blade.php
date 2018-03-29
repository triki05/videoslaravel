<p>Estimado usuario:</p>
<br>
<p>Ha solicitado resetear su contraseña para lo cual tiene que hacer click en el siguiente enlace:<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">Resetear contraseña </a></p>
<br>
<p>Recibe un saludo desde el equipo de MiniYoutube</p>
