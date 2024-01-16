<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="/assets/css/main.css">

  <title>Desafio Revvo | <?php echo $title; ?></title>
</head>
<body>
 <div class="relative flex min-h-screen flex-col overflow-hidden bg-gray-100">
    <?php include 'HeaderView.php'; ?>
    <?php include 'SliderView.php'; ?>
    
    <div class="mx-auto p-16 ">
        <h1 class="font mb-6 border-b border-gray-300 pb-2 text-2xl font-medium uppercase text-gray-800">Meus Cursos</h1>
        <?php echo $content; ?>
    </div>
    

    <?php include 'FooterView.php'; ?>
  </div>
</body>
</html>
</div>
