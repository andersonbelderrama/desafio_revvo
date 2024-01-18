<div id="slider" class="slider">
    <div id="slides" class="slides">

      <?php 
        $courseModel = new \App\Models\CourseModel();
        $slides = $courseModel->getAllCourses(4);
        
      foreach ($slides as $slide): ?>

        <div class="slide-container">
          <img src="/assets/img/courses/<?= $slide['image_filename'] ?>"  class="slide-img" />
          <div class="slide-info-container">
            <h2 class="slide-info-title"><?= $slide['name'] ?></h2>
            <p class="slide-info-text"><?= $slide['short_description'] ?></p>
            <button class="slide-info-btn" onclick="location.href='/curso/<?= $slide['id'] ?>' ">Ver Curso</button>
          </div>
        </div>

      <?php endforeach ?>
     
    </div>

    <button id="prevBtn" class="slider-btn-left">
      <svg xmlns="http://www.w3.org/2000/svg" height="64" width="30" viewBox="0 0 320 512" fill="#ffff">
        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
      </svg>
    </button>

    <button id="nextBtn" class="slider-btn-right">
      <svg xmlns="http://www.w3.org/2000/svg" height="64" width="30" viewBox="0 0 320 512" fill="#ffff">
        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
      </svg>
    </button>

    <div id="selector" class="slider-selector">
    <?php for ($i = 0; $i < count($slides); $i++): ?>
      <div class="slider-selector-dot <?php echo ($i === 0) ? 'slider-selector-dot-active' : ''; ?>"></div>
    <?php endfor; ?>
    </div>
  </div>


<script>
  window.totalSlides = <?php echo count($slides); ?>;
</script>