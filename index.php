<?php require_once("includes/include-all.php")?>

<!doctype html>
<html lang="en">
  <head>
    <title>CometLand ID</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    session_start();
    if (!isset($_SESSION['locale'])){
      $_SESSION['locale'] = "en-us";
    }
    $localeLoader = new LocaleLoader($_SESSION['locale']);
    
    if (isset($_SESSION['authorisation']))
    {
        if (isset($_GET['logout']) && $_GET['logout'] == 1)
        {
            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/oauth2/token/revoke?token=");
            $fields = [
                'client_id' => $config->getClientId(),
                'client_secret' => $config->getClientSecret(),
                'token' => $_SESSION['authorisation']->access_token
            ];
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            
            curl_exec($ch);
            session_destroy();

            header('Location: /dev/cometland/');
        }
        else
        {        
            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, "https://discord.com/api/users/@me");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '.$_SESSION['authorisation']->access_token
            ));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

            $user = json_decode(curl_exec($ch),false);
            $localeLoader->loadLocale($user->locale);
?><a href="<?php echo '/dev/cometland/?logout=1' ?>"><button type="button" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> <?php $localeLoader->echoString("logout")?></button></a>
<?php
        }
    }
    else{
    ?>
    <a href="<?php echo $config->getRedirectUrl()?>"><button type="button" class="btn btn-primary"><i class="fab fa-discord"></i> <?php $localeLoader->echoString("login")?></button></a>
    <?php }?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  </body>
</html>