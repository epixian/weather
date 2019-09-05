<template>
    <div id="view-locations">
        <view-header 
            :title="title"
            :subtitle="subtitle"></view-header>

        <div class="container section">
            <location
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
                location: {},
                message: ''
            }
        },

        computed: {
            title: function () { 
                return 'Location ' + this.location.id; 
            },
            subtitle: function () { 
                return this.fullAddress; 
            },
            fullAddress: function () {
                return this.location.address_1 + (this.location.address_2 ? ' ' + this.location.address_2 : '') + ', ' +
                    this.location.city + ', ' + this.location.state + ' ' + this.location.postal_code;
            }
        },

        methods: {
            getLocation(location) {
                axios.get('/api/locations/' + location)
                    .catch(error => { 
                        console.error('Error: ' + error);
                        this.message = error.response.data.error; 
                    })
                    .then(response => {
                        this.location = response.data;
                    });
            }
        },

        mounted() {
            this.getLocation(this.$route.params.id);
        }
    }
</script>