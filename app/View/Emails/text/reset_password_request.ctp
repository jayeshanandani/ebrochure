<p>Dear <?php echo $username; ?>,</p>

<p>You may change your password using the link below.</p>
<?php $url = env('SERVER_NAME') . '/ruchika/forgot_passwords/reset_password_token/' . $token; ?>
<p><?php echo $this->Html->link('Password Reset', $url); ?></p>

<p>Your password won't change until you access the link above and create a new one.</p>
<p>Thanks and have a nice day!</p>
