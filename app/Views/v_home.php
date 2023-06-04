<div id="map" style="width: 100%; height: 100vh;"></div>
<script src="app/Views/geojson/bangunan.js"></script>
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
    .bindPopup("<B><?= $value['nama_wilayah'] ?> </b><br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/widodomartani.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=19i1Azft3YaDXZnIUDBVZF4R92s_kC2Rv'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
    .addTo(map);
    <?php } ?>

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

            // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel1.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel1Layer = L.geoJSON(data, {
                style: {
                    color: 'yellow'
                }
            }).bindPopup ("AOI Kel 1 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel1.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1bc0TE1TBve_2bBdiks7_iKGdGyQQjOpE'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
    .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel1Layer, 'AOI Kel 1');
        }); 

         // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel2.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel2Layer = L.geoJSON(data, {
                style: {
                    color: 'blue'
                }
            })
            .bindPopup ("AOI Kel 2 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel2.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1t9A439jPw48BBlPWzOwsXkYmVRjyZ4qn'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel2Layer, 'AOI Kel 2');
        });
        
                // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel3.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel3Layer = L.geoJSON(data, {
                style: {
                    color: 'green'
                }
            })
            .bindPopup("AOI Kel 3 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel3.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=14zak5hyt9Z8e0-AVTMSOKdGKXxK3Wun-'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel3Layer, 'AOI Kel 3');
        });

                // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel4.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel4Layer = L.geoJSON(data, {
                style: {
                    color: 'orange'
                }
            })
            .bindPopup("AOI Kel 4 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel4.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1t9A439jPw48BBlPWzOwsXkYmVRjyZ4qn'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel4Layer, 'AOI Kel 4');
        });
        
                // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel6.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel6Layer = L.geoJSON(data, {
                style: {
                    color: 'purple'
                }
                
            })
            .bindPopup("AOI Kel 6 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel6.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1CML-_W0rItKTP6SFRauzo7vCt87bliB1'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel6Layer, 'AOI Kel 6');
        });

                        // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel7.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel7Layer = L.geoJSON(data, {
                style: {
                    color: 'grey'
                }
            })
            .bindPopup("AOI Kel 7 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel7.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1lViINDovD_ihpuyAdYB1hX7qQmVLWgsO'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel7Layer, 'AOI Kel 7');
        });

                        // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel8.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel8Layer = L.geoJSON(data, {
                style: {
                    color: 'cyan'
                }
            })
            .bindPopup("AOI Kel 8 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel8.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1cXkgGYXrIqNbhmG4I0q-_tdZWORneUEh'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel8Layer, 'AOI Kel 8');
        });

                        // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel9.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel9Layer = L.geoJSON(data, {
                style: {
                    color: 'magenta'
                }
            })
            .bindPopup("AOI Kel 9 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel9.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id= 'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel9Layer, 'AOI Kel 9');
        });

                        // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel10.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel10Layer = L.geoJSON(data, {
                style: {
                    color: 'coral'
                }
            })
            .bindPopup("AOI Kel 10 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel10.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1tDQ0ndvC97LSZiyST1biP-KIv-BWqpq0'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel10Layer, 'AOI Kel 10');
        });

                        // Read GeoJSON data for batas dusun from local file
 fetch('http://localhost/GISekolah4/public/geojson/mapkel12.geojson')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Create GeoJSON layer for the batas dusun data
            var mapkel12Layer = L.geoJSON(data, {
                style: {
                    color: 'black'
                }
                
            })
            .bindPopup("AOI Kel 12 <br>" 
    +"<img src='http://localhost/GISekolah4/public/foto/kel12.jpeg' width='210px' height='150px'><br>" 
    +"<a href='https://drive.google.com/uc?export=download&id=1UT6kDUX9Tzf1j7mEfK0qaZ5mgb1EoRMP'class='btn btn-primary btn-xs text-white'>Unduh Peta</a>")
            .addTo(map);
            // Add the batas dusun  layer to the layer control
            layerControl.addOverlay(mapkel12Layer, 'AOI Kel 12');
        });

        L.control.scale().addTo(map);

map.on('click', function(e) {
    var coord = e.latlng;
    L.popup()
        .setLatLng(coord)
        .setContent('Koordinat: ' + coord.lat.toFixed(6) + ', ' + coord.lng.toFixed(6))
        .openOn(map);
});


</script>