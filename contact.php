<?php require_once __DIR__ . '/includes/header.php';
$sent=false;$name=$_POST['name']??'';$email=$_POST['email']??'';$message=$_POST['message']??'';
if($_SERVER['REQUEST_METHOD']==='POST' && $name!=='' && $email!=='' && $message!==''){ $sent=true; }
function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<h1>Contact</h1>
<?php if($sent): ?><p class="card">Merci <?= e($name) ?> ! (envoi factice)</p><?php endif; ?>
<form method="post" class="card" style="padding:12px">
  <p><label>Nom<br><input name="name" required value="<?= e($name) ?>"></label></p>
  <p><label>Email<br><input type="email" name="email" required value="<?= e($email) ?>"></label></p>
  <p><label>Message<br><textarea name="message" rows="4" required><?= e($message) ?></textarea></label></p>
  <button>Envoyer</button>
</form>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
