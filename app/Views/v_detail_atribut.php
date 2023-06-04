<div class="col-sm-6">
<div id="map" style="width: 100%; height: 500px;"></div>
</div>
<div class="col-sm-6">
  <img src="<?= base_url('foto/' . $atribut['foto']) ?>" width="100%" height="500px">
</div>

<div class="col-sm-12">
          <table class="table table-bordered table-sm">
            <tr>
              <th width="180px">Nama Pemilik</th>
              <th width="50px" class= "text-center">:</th>
              <td><?= $atribut['nama_pemilik'] ?></td>
            </tr>

            <tr>
              <th> Jumlah Keluarga</th>
              <th  class= "text-center">:</th>
              <td><?= $atribut['jumlah_keluarga'] ?></td>
            </tr>
            
            <tr>
              <th>Jenis Atribut</th>
              <th  class= "text-center">:</th>
              <td><?= $atribut['jenis_atribut'] ?></td>
            </tr>

            <tr>
              <th >Kondisi Atribut</th>
              <th  class= "text-center">:</th>
              <td><?= $atribut['kondisi'] ?></td>
            </tr>

            <tr>
              <th> Luas (m2)</th>
              <th class= "text-center">:</th>
              <td><?= $atribut['luas'] ?></td>
            </tr>

            <tr>
              <th > Anggaran</th>
              <th  class= "text-center">:</th>
              <td><?= $atribut['anggaran'] ?></td>
            </tr>

            <tr>
              <th >Alamat Atribut</th>
              <th class= "text-center">:</th>
              <td><?= $atribut['alamat'] ?>,<?= $atribut['nama_kecamatan'] ?>,<?= $atribut['nama_kabupaten'] ?>,<?= $atribut['nama_provinsi'] ?></td>
            </tr>
          </table>
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
    
 // Read GeoJSON data for Atribut Dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/bangunan.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var bangunanLayer = L.geoJSON(data, {
                style: {
                    color: 'red'
                }
                
            }).addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(bangunanLayer, 'Bangunan');
        }); 

        fetch('http://localhost/GISekolah4/public/geojson/kebun.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var kebunLayer = L.geoJSON(data, {
                style: {
                    color: 'green'
                }
            }).addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(kebunLayer, 'Kebun');
        }); 

        fetch('http://localhost/GISekolah4/public/geojson/ladang.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var ladangLayer = L.geoJSON(data, {
                style: {
                    color: 'yellow'
                }
            }).addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(ladangLayer, 'Ladang');
        }); 

        fetch('http://localhost/GISekolah4/public/geojson/lahan.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var lahanLayer = L.geoJSON(data, {
                style: {
                    color: 'brown'
                }
            }).addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(lahanLayer, 'Lahan');
        }); 

        fetch('http://localhost/GISekolah4/public/geojson/sawah.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var sawahLayer = L.geoJSON(data, {
                style: {
                    color: 'lime'
                }
            }).addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(sawahLayer, 'Sawah');
        });

        <?php foreach ($wilayah as $key => $value){ ?>
    L.geoJSON(<?= $value ['geojson'] ?>, {
    fillColor: '<?= $value['Warna'] ?>',
    fillOpacity: 0.5,
    })
    .addTo(map);
    <?php } ?>
        L.marker([<?= $atribut['koordinat'] ?>]).addTo(map)

</script>