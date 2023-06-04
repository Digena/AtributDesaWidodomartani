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
      session();
      $validation = \Config\Services::validation();
      ?>

<?php echo form_open_multipart('Atribut/InsertData') ?>

<div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Nama Pemilik</label>
            <input name="nama_pemilik" value="<?= old('nama_pemilik') ?>" placeholder="Nama Pemilik" class="form-control">
            <p class="text-danger"><?= $validation->hasError('nama_pemilik') ? $validation->getError('nama_pemilik') : '' ?></p>
          </div>
        </div>

<div class="col-sm-3">
          <div class="form-group">
            <label>Jumlah Keluarga</label>
            <input name="jumlah_keluarga" value="<?= old('jumlah_keluarga') ?>" placeholder="jumlah_keluarga" class="form-control">
            <p class="text-danger"><?= $validation->hasError('jumlah_keluarga') ? $validation->getError('jumlah_keluarga') : '' ?></p>
          </div>
        </div>

<div class="col-sm-3">
          <div class="form-group">
            <label>Luas (m2)</label>
            <input name="luas" value="<?= old('luas') ?>" placeholder="luas" class="form-control">
            <p class="text-danger"><?= $validation->hasError('luas') ? $validation->getError('luas') : '' ?></p>
          </div>
        </div>

<div class="col-sm-4">
          <div class="form-group">
            <label>Anggaran (Rp)</label>
            <input name="anggaran" value="<?= old('anggaran') ?>" placeholder="anggaran" class="form-control">
            <p class="text-danger"><?= $validation->hasError('anggaran') ? $validation->getError('anggaran') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Atribut</label>
            <select name="jenis_atribut" class="form-control">
              <option value="">--Pilih Atribut --</option>
              <option value="Rumah">Rumah</option>
              <option value="Lahan">Lahan</option>
              <option value="Sawah">Sawah</option>
              <option value="Ladang">Ladang</option>
              <option value="Kebun">Kebun</option>
              <option value="Jalan">Jalan</option>
            </select>
            <p class="text-danger"><?= $validation->hasError('atribut') ? $validation->getError('atribut') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kondisi</label>
            <select name="id_kondisi" class="form-control">
              <option value="">--Pilih Kondisi--</option>
              <?php foreach ($kondisi as $key => $value) { ?>
                <option value="<?= $value['id_kondisi'] ?>"><?= $value['kondisi'] ?></option>
              <?php } ?>
            </select>
            <p class="text-danger"><?= $validation->hasError('id_jenjang') ? $validation->getError('id_kondisi') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Koordinat Atribut</label>
        <div id="map" style="width: 100%; height: 500px;"></div>
        <input name="koordinat" id=" koordinat " value="<?= old('koordinat') ?>" placeholder="Koordinat Atribut" class="form-control" readonly>
        <p class="text-danger"><?= $validation->hasError('koordinat') ? $validation->getError('koordinat') : '' ?></p>
      </div>

      <div class="row">
      <div class="col-xl-4">
          <div class="form-group">
            <label>Provinsi</label>
            <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%;">
            <option value="">--Pilih Provinsi---</option>
              <?php foreach ($provinsi as $key => $value) { ?>  
                <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
              <?php  } ?>
              </select>
            <p class="text-danger"><?= $validation->hasError('id_provinsi') ? $validation->getError('id_provinsi') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kabupaten</label>
            <select name="id_kabupaten" id="id_kabupaten" class="form-control select2">
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Kecamatan</label>
            <select name="id_kecamatan" id="id_kecamatan" class="form-control select2">
            </select>
            <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" value="<?= old('alamat') ?>" placeholder="Alamat Atribut" class="form-control">
            <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label>Wilayah Administrasi</label>
            <select name="id_wilayah" class="form-control">
            <option value="">--Pilih Wilayah Administrasi---</option>
              <?php foreach ($wilayah as $key => $value) { ?>
                <option value="<?= $value['id_wilayah'] ?>"><?= $value['nama_wilayah'] ?></option>
              <?php  } ?>  
          </select>
            <p class="text-danger"><?= $validation->hasError('id_wilayah') ? $validation->getError('id_wilayah') : '' ?></p>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
      <div class="form-group">
        <label>Foto Atribut</label>
        <input type="file" accept=".jpg" name="foto" value="<?= old('foto') ?>" class="form-control" required>
        <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
      </div>

      <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
      <a href="<?= base_url('Atribut') ?>" class="btn btn-success btn-flat">Kembali</a>
    

<?php echo form_close() ?>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    $('#id_provinsi').change(function() {
      var id_provinsi = $('#id_provinsi').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Atribut/Kabupaten') ?>",
        data: {
          id_provinsi: id_provinsi,
        },
        success: function(response) {
          $('#id_kabupaten').html(response);
        }
      });
    });

    $('#id_kabupaten').change(function() {
      var id_kabupaten = $('#id_kabupaten').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Atribut/Kecamatan') ?>",
        data: {
          id_kabupaten: id_kabupaten,
        },
        success: function(response) {
          $('#id_kecamatan').html(response);
        }
      });
    });
  });
</script>

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
    
    .addTo(map);
    <?php } ?>

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
            layerControl.addOverlay(sawahLayer, 'Sawah1');
        });

    var coordinatInput = document.querySelector("[name=koordinat]");
var curLocation = [<?= $web['koordinat_wilayah'] ?>];
map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
  draggable: 'true',
});

//mengambil coordinat saat marker di geser
marker.on('dragend', function(e) {
  var position = marker.getLatLng();
  marker.setLatLng(position, {
    curLocation
  }).bindPopup(position).update();
  $("#Coordinat").val(position.lat + "," + position.lng);
});

//mengambil coordinat saat map onclik
map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    } else {
      marker.setLatLng(e.latlng);
    }
    coordinatInput.value = lat + ',' + lng;
  });

map.addLayer(marker);

</script>