<template>
    <div :id="'location-' + data.id" class="message">
        <div class="message-header">
            <p><router-link :to="href">Location {{ data.id }}</router-link></p>
        </div>
        <div class="message-body columns">
            <div class="column">
                <p>{{ fullAddress }}</p>
            </div>
            <div class="column" v-if="this.data.weather_location">
                <p>Weather location {{ this.data.weather_location.address }} is recording forecasts for this location.</p>
            </div>
        </div>        
    </div>
</template>

<script>
    import WeatherLocation from './WeatherLocation.vue';

    export default {
        name: 'location',

        components: { WeatherLocation },

        props: [ 'data' ],

        // data() {
        //     return {
        //         id: this.data.id,
        //         address_1: this.data.address_1,
        //         address_2: this.data.address_2,
        //         city: this.data.city,
        //         state: this.data.state,
        //         postal_code: this.data.postal_code,
        //     }
        // },

        computed: {
            fullAddress: function () {
                return this.data.address_1 + (this.data.address_2 ? ' ' + this.data.address_2 : '') + ', ' +
                    this.data.city + ', ' + this.data.state + ' ' + this.data.postal_code;
            },
            href: function () {
                return '/locations/' + this.data.id;
            }
        }
    }
</script>