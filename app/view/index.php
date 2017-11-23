<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="http://farm/css/style.css">
   <title>Index</title>
   </head>
<body>
<header>
   <h1>Фарм-лист</h1>
   <nav>
      <a href="/index/noactive">Неактиви</a>
      <a href="/index/oasis">Оазиси</a>
      <a href="/index/natars">Натари</a>
   </nav>
</header>
<div class="wrapper">
   <section id="steezy">
      <?=indexController::logged();?><br>
      <a href="/index/form">Додати</a><br><br>

      <div class="show">
         <?php indexController::show(); ?>
      </div>

      <div class="del">
         <?php indexController::delAction(); ?>
      </div>
   </section>
</div>
</body>
</html>
