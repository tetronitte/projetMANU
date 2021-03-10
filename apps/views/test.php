
<form action="UserController/login" method="POST">
    <input type='mail' name="mail" value="<?php if(isset($profil)) echo $profil['mail'] ?>"></input>
    <?= form_error('mail') ?>
    <input type='text' name="pwd" value="<?php if(isset($profil)) echo $profil['pwd'] ?>"></input>
    <?= form_error('pwd') ?>
    <input type='checkbox' name='autolog' value='on' checked>
    <input type='submit' value="envoyer"></input>
</form>