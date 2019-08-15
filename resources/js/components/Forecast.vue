<template>
    <div :id="data.id">
        <div class="currently">
            {{ currentTemp | rounded }}° F, {{ currentConditions }} as of {{ time | ago }}
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    
    export default {
        name: 'forecast',
        
        props: [ 'data' ],

        filters: {
            ago(date) {
                return moment.unix(date).fromNow();
            },

            rounded(value) {
                return Math.round(value);
            }
        },

        data() {
            return {
                currentTemp: this.data.data.currently.temperature,
                currentConditions: this.data.data.currently.summary,
                time: this.data.data.currently.time
            };
        }
    }
</script>