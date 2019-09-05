<template>
    <div id="view-weather-locations">
        <div class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Weather Locations
                    </h1>
                    <h2 class="subtitle">
                        Forecast data is being collected for the following locations:
                    </h2>
                </div>
            </div>
        </div>

        <div class="columns">
            <div id="map" class="column is-two-thirds">
                <iframe :src="mapUrl" style="width:100%;height:500px;border:0;"></iframe>
            </div>

            <div class="column section">
                <weather-location
                    v-for="location in weatherLocations"
                    :key="location.address"
                    :data="location"></weather-location>

                <add-weather-location @location_added="addWeatherLocation"></add-weather-location>
            </div>
        </div>

        <div class="container section">Powered by <a href="https://darksky.net/poweredby/">DarkSky</a></div>
    </div>
</template>

<script>
    import WeatherLocation from '../components/WeatherLocation.vue';
    import AddWeatherLocation from '../components/AddWeatherLocation.vue';

    export default {
        components: { WeatherLocation, AddWeatherLocation },

        data() {
            return {
                weatherLocations: [],
                message: '',
                mapEmbed: ''
            }
        },

        computed: {
            lats() {
                return this.weatherLocations.map(l => parseFloat(l.lat));
            },
            lngs() {
                return this.weatherLocations.map(l => parseFloat(l.lng));
            },
            minLat() {
                return Math.min(...this.lats);
            },
            maxLat() {
                return Math.max(...this.lats);
            },
            minLng() {
                return Math.min(...this.lngs);
            },
            maxLng() {
                return Math.max(...this.lngs);
            },
            zoom() {
                let spread = Math.max(Math.abs(this.maxLat - this.minLat), Math.abs(this.maxLng - this.minLng));
                if (spread > 40) return 4;
                if (spread > 20) return 5;
                if (spread > 12) return 6;
                if (spread > 8) return 7;
                if (spread > 5) return 8;
                else return 9;
            },
            mapCenter() {
                return {
                    lat: ((Math.max(...this.lats) + Math.min(...this.lats)) / 2 * 10000) / 10000,
                    lng: ((Math.max(...this.lngs) + Math.min(...this.lngs)) / 2 * 10000) / 10000
                    // lng: Math.round(this.weatherLocations.map(l => parseFloat(l.lng))
                    //     .reduce((acc, c) => acc + c, 0) / this.weatherLocations.length * 10000) / 10000
                };
            },

            mapUrl() {
                return 'https://maps.darksky.net/@radar,' + this.mapCenter.lat + ',' + this.mapCenter.lng + ',' + this.zoom;
            } 
        },

        methods: {
            addWeatherLocation(location) {
                this.weatherLocations.push(location);
            },

            getWeatherLocations() {
                axios.get('/api/weatherlocations')
                    .catch(error => { 
                        console.error('Error: ' + error);
                        this.message = error.response.data.error; 
                    })
                    .then(response => {
                        this.weatherLocations = response.data;
                    });
            },
        },

        mounted() {
            this.getWeatherLocations();
        }
    }
</script>