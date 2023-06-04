<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$judul?></h3>

                <div class="card-tools">
                  <a href="<?= base_url('wilayah/Input') ?>" class="btn btn-flat btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah
</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             
              <?php
      //notif insert daata
      if (session()->getFlashdata('insert')) {
        echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('insert');
        echo '</h5></div>';
      }
      //notif update daata
      if (session()->getFlashdata('update')) {
        echo '<div class="alert alert-primary alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('update');
        echo '</h5></div>';
      }

    //notif Delete daata
    if (session()->getFlashdata('delete')) {
      echo '<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h5><i class="icon fas fa-check"></i>';
      echo session()->getFlashdata('delete');
      echo '</h5></div>';
    }
             ?>

             <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width= "50 px">No</th>
                        <th>Nama Wilayah</th>
                        <th>Warna</th>
                        <th width= "100 px">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach ($wilayah as $key => $value){ ?>
                        <tr>    
                        <td><?= $no++ ?></td>
                            <td><?= $value['nama_wilayah'] ?></td>
                            <td style="background-color:<?= $value ['Warna'] ?>;"></td>
                            <td class="text-center">
                            <a href="<?= base_url('Wilayah/Edit/' . $value['id_wilayah']) ?>" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                <a href="<?= base_url('Wilayah/Delete/' . $value['id_wilayah']) ?>" onclick="return confirm('Yakin Hapus Data..?')"
"class="btn btn-sm btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                    <?php } ?>
                </tbody>
              </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12"> 
          <div id="map" style="width: 100%; height: 100vh;"></div>

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

    <?php foreach ($wilayah as $key => $value){ ?>
    L.geoJSON(<?= $value ['geojson'] ?>, {
    fillColor: '<?= $value['Warna'] ?>',
    fillOpacity: 0.5,
    })
    .bindPopup("<B><?= $value['nama_wilayah'] ?> </b>")
    .addTo(map);
    <?php } ?>

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>