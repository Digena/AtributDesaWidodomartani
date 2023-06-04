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

    
    var wilayah = L.geoJSON(<?= $detailwilayah ['geojson'] ?>, {
    fillColor: '<?= $detailwilayah['Warna'] ?>',
    fillOpacity: 0.5,
    }).addTo(map)
    .bindPopup("<B><?= $detailwilayah['nama_wilayah'] ?> </b>")
    .openPopup();
    
 
    map.fitBounds(wilayah.getBounds());

    <?php foreach ($atribut as $key => $value) { ?>
    var Icon = L.icon({
      iconUrl: '<?= base_url('marker/' . $value['marker']) ?>',
      iconSize: [20, 25], // size of the icon
    });

    L.marker([<?= $value['koordinat'] ?>], {
        icon: Icon
      })
      .bindPopup("<img src='<?= base_url('foto/' . $value['foto']) ?>' width='210px' height='150px'><br>" +
        "<b><?= $value['nama_pemilik'] ?></b><br>" +
        "Luas (m2) <?= $value['luas'] ?><br>" +
        "<?= $value['jenis_atribut'] ?><br><br>" +
        "<a href='<?= base_url('Home/DetailAtribut/' . $value['id_atribut']) ?>' class='btn btn-primary btn-xs text-white'>Detail</a>")
      .addTo(map);
  <?php } ?>

</script>