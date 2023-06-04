<!-- ./col -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $jmlatribut ?></h3>

      <p>Atribut</p>
    </div>
    <div class="icon">
      <i class="fas fa-warehouse"></i>
    </div>
    <a href="<?= base_url('Atribut') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- Small boxes (Stat box) -->
<div class="col-lg-6 col-6">
  <!-- small box -->
  <div class="small-box bg-indigo">
    <div class="inner">
      <h3><?= $jmlwilayah ?></h3>

      <p>Wilayah</p>
    </div>
    <div class="icon">
      <i class="fas fa-layer-group"></i>
    </div>
    <a href="<?= base_url('Wilayah') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<?php
$db = \Config\Database::connect();
foreach ($kondisi as $key => $value) {
  $jml = $db->table('tbl_atribut')->where('id_kondisi', $value['id_kondisi'])->countAllResults();
?>
  <!-- ./col -->
  <div class="col-lg-3 col-3">
    <!-- small box -->
    <div class="small-box <?php if ($value['id_kondisi'] == 1) {
                            echo 'bg-success';
                          } elseif ($value['id_kondisi'] == 2) {
                            echo 'bg-danger';
                          } elseif ($value['id_kondisi'] == 3) {
                            echo 'bg-primary';
                          } else {
                            echo 'bg-info';
                          } ?>">
      <div class="inner">
        <h3><?= $jml ?></h3>

        <p><?= $value['kondisi'] ?></p>
      </div>
      <div class="icon">
        <i class="fas fa-eye"></i>
      </div>
      <a href="<?= base_url('Kondisi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<?php } ?>

<div class="spinner">
  <div class="outer">
    <div class="inner tl"></div>
    <div class="inner tr"></div>
    <div class="inner br"></div>
    <div class="inner bl"></div>
  </div>
</div>

<div class="gallery">
  <img src="http://localhost/GISekolah4/public/foto/dignara.jpeg" alt="a dream catcher">
  <img src="http://localhost/GISekolah4/public/foto/iqbal.jpeg" alt="a piano">
  <img src="http://localhost/GISekolah4/public/foto/kiki.jpeg" alt="a live concert">
  
</div>

<?php
echo '<style>
  .gallery  {
    --s: 280px; /* kontrol ukuran */
  
    display: grid;
    width: var(--s);
    aspect-ratio: 1;
    overflow: hidden;
    padding: calc(var(--s)/20);
    border-radius: 50%;
    position: relative;
    clip-path: circle(49.5%); /* untuk menghindari beberapa masalah yang disebabkan oleh overflow: hidden */
  }
  
  .gallery::after {
    content: "";
    position: absolute;
    inset: 0;
    padding: inherit;
    border-radius: inherit;
    background: repeating-conic-gradient(#789048 0 30deg,#DFBA69 0 60deg);
    -webkit-mask: 
       linear-gradient(#fff 0 0) content-box, 
       linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
            mask-composite: exclude;
  }
  
  .gallery > img {
    grid-area: 1/1;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: inherit;
    transform-origin: 50% 120.7%;
  }
  
  .gallery::after,
  .gallery > img {
    animation: m 8s infinite cubic-bezier(.5,-0.2,.5,1.2);
  }
  
  .gallery > img:nth-child(2) {animation-delay: -2s}
  .gallery > img:nth-child(3) {animation-delay: -4s}
  .gallery > img:nth-child(4) {animation-delay: -6s}
  
  @keyframes m {
    0%,3%    {transform: rotate(0)}
    22%,27%  {transform: rotate(-90deg)}
    47%,52%  {transform: rotate(-180deg)}
    72%,77%  {transform: rotate(-270deg)}
    98%,100% {transform: rotate(-360deg)}
  }
  
  body {
    margin: 0;
    min-height: 100vh;
    display: grid;
    place-content: center;
    background: #C2CBCE;
  }
</style>';
?>