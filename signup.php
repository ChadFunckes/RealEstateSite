<?php
require_once('includes/init.php');
// Require the user to NOT be logged in before they can see this page.
 
// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = User::signup($_POST);
  if (empty($user->errors)) {
    // Redirect to signup success page
    Util::redirect('/signup_success.php');
  }
}

 
?>
<?php if (isset($user)): ?>
  <ul>
    <?php foreach ($user->errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>