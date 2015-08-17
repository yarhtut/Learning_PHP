<?php if (isset($_POST['submit'])): ?>
  <?php
  // set up autoloader
  require ('..\vendor\autoload.php');

  // configure database
  $dsn = 'mysql:dbname=video_tutorial;host=localhost';
  $u = 'root';
  $p = '';
  Cartalyst\Sentry\Facades\Native\Sentry::setupDatabaseResolver(new PDO($dsn, $u, $p));


// create group record
  try {

    $group1 = Cartalyst\Sentry\Facades\Native\Sentry::createGroup(array(
        'name'    => 'Users',
        'permissions' => array(
            'watch' =>1,
            'view' => 0,
            'add' => 0,
            'edit' => 0,
            'delete' => 0

        )
    ));

    $group2 = Cartalyst\Sentry\Facades\Native\Sentry::createGroup(array(
        'name'    => 'Administrator',
        'permissions' => array(
            'watch' =>1,
            'view' => 1,
            'add' => 1,
            'edit' => 1,
            'delete' => 1
        )
    ));

  } catch (Exception $e) {
    echo $e->getMessage();
  }

  // validate input and create user record
  try {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $fname = strip_tags($_POST['first_name']);
    $lname = strip_tags($_POST['last_name']);
    $password = strip_tags($_POST['password']);

    $user = Cartalyst\Sentry\Facades\Native\Sentry::createUser(array(
        'email'    => $email,
        'password' => $password,
        'first_name' => $fname,
        'last_name' => $lname,
        'permissions' => $_POST['perms'],
        'activated' => true,
    ));
    $group = Cartalyst\Sentry\Facades\Native\Sentry::findGroupByName('Users');
    $user->addGroup($group);
    echo 'User successfully created.';


  } catch (Exception $e) {
    echo 'User could not be created. ' . $e->getMessage();
  }
  ?>
<?php else: ?>
  <html>
  <head></head>
  <body>
  <h1>Add User</h1>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      Email address: <br/>
      <input type="text" name="email" /> <br/>
      Password: <br/>
      <input type="password" name="password" /> <br/>
      First name: <br/>
      <input type="text" name="first_name" /> <br/>
      Last name: <br/>
      <input type="text" name="last_name" /> <br/>
      Permissions: <br/>
      <input type="checkbox" name="perms[watch]" value="1" />Watch
      <input type="checkbox" name="perms[view]" value="1" />View
      <input type="checkbox" name="perms[add]" value="1" />Add
      <input type="checkbox" name="perms[edit]" value="1" />Edit
      <input type="checkbox" name="perms[delete]" value="1" />Delete
      <input type="submit" name="submit" value="Create" />
    </form>
  </body>
  </html>
<?php endif; ?>