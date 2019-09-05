<template>
    <div id="view-locations">
        <view-header 
            :title="title"
            :subtitle="subtitle"></view-header>

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
    import ViewHeader from '../components/ViewHeader.vue';

    export default {
        components: { Location, ViewHeader },

        data() {
            return {
                locations: [],
                message: '',
                title: 'Locations',
                subtitle: 'Your customers\' jobsites'
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