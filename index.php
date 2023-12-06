<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
    require_once "system/lib/session.php";
    require_once "app/config/config.php";
    require_once "system/lib/main.php";
    require_once "system/lib/controller.php";
    require_once "system/lib/database.php";
    require_once "system/lib/model.php";
    require_once "system/lib/load.php";
    require_once "system/lib/Carbon-2.57.0/autoload.php";
  ?>
  <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
  <df-messenger
    intent="WELCOME"
    chat-title="Hỗ trợ tự động"
    agent-id="d5741ffa-109e-4314-9a51-9c71a5524662"
    language-code="vi"
  ></df-messenger>
  <?php
    $main = new main();
  ?>
</body>

</html>
