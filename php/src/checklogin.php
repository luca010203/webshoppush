if (isset($_POST['submit'])){
    $username=mysql_escape_string($_POST['username']);
    $password=mysql_escape_string($_POST['password']);
    if (!$_POST['username'] | !$_POST['password'])
     {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You did not complete all of the required fields')
            window.location.href='htmlogin.html'
            </SCRIPT>");
    exit();
         }


    $sql= mysql_query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    if(mysql_num_rows($sql) > 0)
    {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Login Succesfully!.')
            window.location.href='SeniorDB_DBLibrary'
            </SCRIPT>");
    exit();
    }
    else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Wrong username password combination.Please re-enter.')
            window.location.href='htmllogin.html'
            </SCRIPT>");
    exit();
       }
    }
    else{
    }
    ?>