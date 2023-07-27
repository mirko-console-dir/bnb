// centro della mappa
            var HQ = { lat: 45.46428976336229, lng: 9.191959328863394 }

            // visualizzazione della mappa
            var map = tt.map({
                key: '3Lb6xSAA2aORuhekPk7epa88Y9SpvSla',
                container: 'map',
                center: HQ,
                zoom: 13
            });

            // maker singolo tramite  posizione (latitudine e longitudine)
            var marker = new tt.Marker().setLngLat(HQ).addTo(map);
