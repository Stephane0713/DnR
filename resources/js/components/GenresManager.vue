<template>
    <div class="test">
        <p>{{genres}}</p>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                genres: null,
            }
        },
        mounted () {
            axios
                .get('/games/'+ this.id + '/get')
                .then(response => (this.genres = response.data))
        },
        props: ['id'],
    }
</script>