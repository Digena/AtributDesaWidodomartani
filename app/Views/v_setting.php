<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $judul ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php
                if(session() -> getFlashdata('pesan')) {
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session() -> getFlashdata('pesan');
                  echo '</h5></div>';
                }
                ?>
                
                <?php echo form_open('Admin/UpdateSetting') ?>


            <div class="row">
              <div class="col-sm-7">
                <div class="form-group">
                    <label>Nama Website</label>
                    <input name="nama_web" value="<?= $web ['nama_web'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Website" required>
                  </div>
                </div>

                    <div class='col-sm-3'>
                       <div class='form-group'>
                      <label>Koordinat Wilayah</label>
                      <input name="koordinat_wilayah" value="<?= $web ['koordinat_wilayah'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Koordinat Wilayah" required>
                    </div>
                  </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                    <label>Zoom View</label>
                    <input type="number" value="<?= $web ['zoom_view'] ?>" name="zoom_view" min="0" max="20" class="form-control" id="exampleInputEmail1" placeholder="Zoom View" required>
                  </div>
                  </div>
                  </div>

                  <button class="btn btn-primary" type="submit" > Simpan </button>

                <?php echo form_close() ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

<div class="col-md-12">
  <div id="map" style="width: 100%; height: 100vh;"></div>
  </div>

<script>
    var Maps = L.tileLayer('https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}');

    var Satellite = L.tileLayer('https://mt2.google.com/vt/lyrs=s&x={x}&y={y}&z={z}');

    var OpenStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png');

    var Roads = L.tileLayer('https://mt1.google.com/vt/lyrs=h&x={x}&y={y}&z={z}');

    var Terrain = L.tileLayer('https://mt1.google.com/vt/lyrs=t&x={x}&y={y}&z={z}');

    var Hybrid = L.tileLayer('  https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}');

    const map = L.map('map', {
        center: [<?= $web ['koordinat_wilayah'] ?>],
        zoom: <?= $web ['zoom_view'] ?>,
        layers: [OpenStreetMap]
    });

    const baseLayers = {
        'Maps': Maps,
        'Satellite': Satellite,
        'OpenStreetMap': OpenStreetMap,
        'Roads': Roads,
        'Terrain': Terrain,
        'Hybrid': Hybrid,
    };

    const layerControl = L.control.layers(baseLayers).addTo(map);
</script>