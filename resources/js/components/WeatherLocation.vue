<template>
    <div :id="'weather-location-' + address" class="message">
        <div class="message-header">
            <p>{{ address }} ({{ lat }}, {{ lng }})</p>
        </div>
        <div class="message-body columns">
            <div class="column">
                <forecast 
                    v-for="forecast in forecasts" 
                    :key="forecast.id"
                    :data="forecast"></forecast>
            </div>
            <div class="column" v-if="locations">
                <p v-for="location in locations">{{ location.address_1 }}</p>
            </div>
        </div>        
    </div>
</template>

<script>
    import Forecast from './Forecast.vue';
    import Location from './Location.vue';

    export default {
        name: 'weather-location',

        components: { Forecast, Location },

        props: [ 'data' ],

        data() {
            return {
                address: this.data.address,
                lat: this.data.lat,
                lng: this.data.lng,
                forecasts: this.data.forecasts,
                locations: this.data.locations
            }
        }
    }
</script>