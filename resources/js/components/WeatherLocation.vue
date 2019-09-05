<template>
    <div :id="'weather-location-' + data.address" class="message">
        <div class="message-header">
            <p><router-link :to="href">Weather Location {{ data.address }}</router-link></p>
        </div>
        <div class="message-body columns is-desktop">
            <div class="column">
                <forecast 
                    v-for="forecast in data.forecasts" 
                    :key="forecast.id"
                    :data="forecast"
                    class="is-size-7"></forecast>
            </div>
            <div class="column" v-if="data.locations">
                <p 
                    v-for="location in data.locations" 
                    :key="location.id" 
                    class="is-size-7">
                    <router-link :to="'/locations/' + location.id">{{ location.address_1 }}</router-link>
                </p>
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

        // data() {
        //     return {
        //         address: this.data.address,
        //         lat: this.data.lat,
        //         lng: this.data.lng,
        //         forecasts: this.data.forecasts,
        //         locations: this.data.locations
        //     }
        // },

        computed: {
            href: function () {
                return '/weatherlocations/' + this.data.id;
            }
        }
    }
</script>