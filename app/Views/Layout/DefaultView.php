<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/assets/css/main.css">

  <title>Desafio Revvo | <?php echo $title; ?></title>
</head>
<body>
 <div class="main-container">
    <?php include 'HeaderView.php'; ?>
    <?php include 'SliderView.php'; ?>
    
    <div class="content">
        <h1 class="content-title">Meus Cursos</h1>
        <?php echo $content; ?>
    </div>
    

    <?php include 'FooterView.php'; ?>
  </div>
</body>
</html>
</div>
