<div class="home-grid-container">

  <?php foreach ($courses as $course): ?>
    <div class="home-grid-item">
      <img src="/assets/img/courses/<?= $course['image_filename'] ?>" class="home-item-img" />
      <div class="home-item-content">
        <h2 class="home-item-title"><?= $course['name'] ?></h2>
        <p class="home-item-text"><?= $course['short_description'] ?></p>
        <button class="home-item-btn" onclick="window.location.href='/curso/<?= $course['id'] ?>'">Ver Curso</button>
      </div>
    </div>
  <?php endforeach;  ?>

</div>
