<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?=$judul?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
        
              <div class="col-sm-6">
<div id="map" style="width: 100%; height: 500px;"></div>
</div>
<div class="col-sm-6">
  <img src="<?= base_url('foto/' . $atribut['foto']) ?>" width="100%" height="500px">
</div>

        <div class="col-sm-12">
          <table class="table table-bordered">
            <tr>
              <th>Nama Pemilik</th>
              <th width="30px">:</th>
              <td><?= $atribut['nama_pemilik'] ?></td>
            </tr>
            <tr>
              <th> Jumlah Keluarga</th>
              <th>:</th>
              <td><?= $atribut['jumlah_keluarga'] ?></td>
            </tr>
            
            <tr>
              <th>Jenis Atribut</th>
              <th>:</th>
              <td><?= $atribut['jenis_atribut'] ?></td>
            </tr>
            <tr>
              <th>Kondisi Atribut</th>
              <th>:</th>
              <td><?= $atribut['kondisi'] ?></td>
            </tr>
            <tr>
              <th> Luas (m2)</th>
              <th>:</th>
              <td><?= $atribut['luas'] ?></td>
            </tr>
            <tr>
              <th> Anggaran</th>
              <th>:</th>
              <td><?= $atribut['anggaran'] ?></td>
            </tr>
            <tr>
              <th>Alamat Atribut</th>
              <th>:</th>
              <td><?= $atribut['alamat'] ?>,<?= $atribut['nama_kecamatan'] ?>,<?= $atribut['nama_kabupaten'] ?>,<?= $atribut['nama_provinsi'] ?></td>
            </tr>
          </table>
          <a href="<?= base_url('Atribut') ?>" class="btn btn-success btn-flat">Kembali</a>
        </div>
      </div>
              
</div>
</div>
</div>

<script>
    var Maps = L.tileLayer('https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}');

    var Satellite = L.tileLayer('https://mt2.google.com/vt/lyrs=s&x={x}&y={y}&z={z}');

    var OpenStreetMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png');

    var Roads = L.tileLayer('https://mt1.google.com/vt/lyrs=h&x={x}&y={y}&z={z}');

    var Terrain = L.tileLayer('https://mt1.google.com/vt/lyrs=t&x={x}&y={y}&z={z}');

    var Hybrid = L.tileLayer('  https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}');

    const map = L.map('map', {
        center: [<?= $atribut['koordinat'] ?>],
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
  
    L.marker([<?= $atribut['koordinat'] ?>].{icon:icon
    }).addTo(map);

</script>