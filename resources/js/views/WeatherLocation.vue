<template>
    <div id="view-weather-locations">
        <view-header 
            :title="title"
            :subtitle="subtitle"></view-header>

        <div class="columns">
            <div id="map" class="column is-two-thirds">
                <iframe :src="mapUrl" style="width:100%;height:500px;border:0;"></iframe>
            </div>

            <div class="column section">
                <weather-location
                    :data="weatherLocation"></weather-location>
            </div>
        </div>

        <div class="container section">Powered by <a href="https://darksky.net/poweredby/">DarkSky</a></div>
    </div>
</template>

<script>
    import WeatherLocation from '../components/WeatherLocation.vue';
    import ViewHeader from '../components/ViewHeader.vue';

    export default {
        components: { WeatherLocation, ViewHeader },

        data() {
            return {
                weatherLocation: {},
                message: '',
                zoom: 9
            }
        },

        computed: {
            title() {
                return 'Weather Location ' + this.weatherLocation.address;
            },
            subtitle() {
                return '(' + this.weatherLocation.lat + ', ' + this.weatherLocation.lng + ')';
            },
            mapCenter() {
                return {
                    lat: this.weatherLocation.lat,
                    lng: this.weatherLocation.lng
                };
            },

            mapUrl() {
                return 'https://maps.darksky.net/@radar,' + this.mapCenter.lat + ',' + this.mapCenter.lng + ',' + this.zoom;
            } 
        },

        methods: {
            getWeatherLocation(weatherLocation) {
                axios.get('/api/weatherlocations/' + weatherLocation)
                    .catch(error => { 
                        console.error('Error: ' + error);
                        this.message = error.response.data.error; 
                    })
                    .then(response => {
                        this.weatherLocation = response.data;
                    });
            },
        },

        mounted() {
            this.getWeatherLocation(this.$route.params.id);
        }
    }
</script>