<? require_once('LL.php'); ?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>MSBS Outcomes Research</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' type='text/css' href='css/theme.css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>

  <body>
    <header>Welcome to Outcomes Research at MSBS!</header>
    
    <!-- Login/Create Account-->
    <section id='login-ctr'>
      <form id='login-form' action="<?= echo EndpointInfo::PATH ?>" accept-charset='utf-8'>
        <ul>
          <li>
            <label for='email-field'>Email:</label>
            <input type='text' id='email-field' formmethod='<?= echo AuthApi::EMAIL_METHOD ?>' autofocus required />
          </li>
          <li>
            <label for='password-field'>Password:</label>
            <input type='text' id='password-field' formmethod='<?= echo AuthApi::PASSWORD_METHOD ?>' required />
          </li>
          <li>
            <input type='submit' name='Login' value='<?= echo AuthApi::LOGIN_TYPE?>' />
            <input type='submit' name='Create Account' value='<?= echo AuthApi::CREATE_ACCOUNT_TYPE?>' />
          </li>
      </form>
    </section>
  </body>
</html>

