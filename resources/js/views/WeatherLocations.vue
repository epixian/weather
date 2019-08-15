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

        <div class="container section">
            <weather-location
                v-for="location in weatherLocations"
                :key="location.address"
                :data="location"></weather-location>

            <add-weather-location @location_added="addWeatherLocation"></add-weather-location>
        </div>
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
                message: ''
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
            }
        },

        mounted() {
            this.getWeatherLocations();
        }
    }
</script>