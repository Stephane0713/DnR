<template>
    <div class="test">
        <div v-for="genre in genres" :key="genre.id">
            <p>{{genre.id}}</p>
            <p>{{genre.name}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {

            }
        },
        props: [
            'id',
            'genres'
        ],
    }
</script>