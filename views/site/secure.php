<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
require_once 'init.php';

if(isset($_POST['subject'],$_POST['body'])){
  $subject=$_POST['subject'];
  $body=$_POST['body'];
  $mailgun->sendMessage(MAILGUN_DOMAIN,[
    'from'    => 'info@sportup.rs',
    'to'      => MAILGUN_LIST,
    'subject' => $subject,

    'html'    => "{$body}<br><br> %mailing_list_unsubscribe_url%"

  ]);
    echo "<script>window.alert('submitted successfully!')</script>";
    sleep(2);

}
if($user == "sportup"
&& $pass == "admin")
{
  ?>
  <div class="container-fluid m-t-10">

                <div class="row">
                  <div class="center">
                    <div class="section-heading">
                    <h2> Newsletter form </h2>
                    <div class="heading-line"></div>
                    <p class="backend_newsletter_text">Ova forma je direktno povezana sa meiling listom sportup.rs.<br>
                    Kada se posalje ova poruka ona automatski stize na sve emailove sa liste.<br>
                    </p>
                </div>
                </div>
                </div>
      <div class="row">
      <div class="center">
    <form action="index.php?r=site%2Fsecure" method="post">
      <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
      <div class="field">
        <label>
          <input type="text" name="subject" autocomplete="off" placeholder="Subject">
        </label>
      </div>
      <div class="field">
        <label>
              <textarea placeholder="Body" name="body" rows="8" autocomplete="off"> </textarea>
        </label>
      </div>
      <input type="submit" values="Send message" class="btn btn-primary btn-block btn-large" style="width:30%; margin:0 auto;">
    </form>
  </div>
  </div>
  </div>
<?
}
else
{
    if(isset($_POST))
    {?>


      <div class='backend_login'>
          <p class="backend_login_text"> Login</p>
          <form method="POST" action="index.php?r=site%2Fsecure">
            <input type="text" name="user" class="backend_login_input" placeholder='Username'></input><br/>
            <input type="password" name="pass" class="backend_login_input" placeholder='Password'></input><br/>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-large"></input>
      </form>

</div>

    <?}
}
?>
