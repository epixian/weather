<template>
    <div id="view-locations">
        <div class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Locations
                    </h1>
                    <h2 class="subtitle">
                        Your customers' jobsites:
                    </h2>
                </div>
            </div>
        </div>

        <div class="container section">
            <location
                v-for="location in locations"
                :key="location.id"
                :data="location"></location>
        </div>
    </div>
</template>

<script>
    import Location from '../components/Location.vue';

    export default {
        components: { Location },

        data() {
            return {
                locations: [],
                message: ''
            }
        },

        methods: {
            addLocation(location) {
                this.locations.push(location);
            },

            getLocations() {
                axios.get('/api/locations')
                    .catch(error => { 
                        console.error('Error: ' + error);
                        this.message = error.response.data.error; 
                    })
                    .then(response => {
                        this.locations = response.data;
                    });
            }
        },

        mounted() {
            this.getLocations();
        }
    }
</script>