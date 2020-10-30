<template>
    <div>
        <p>{{ addedGenres }}</p>
        <p>{{ listGenres }}</p>
        <div class="form-group d-flex">
            <select name="" id="" v-model="currentGenre" class="form-control">
                <option
                    :value="genre.id"
                    v-for="genre of listGenres"
                    :key="genre.id"
                    >{{ genre.name }}</option
                >
            </select>

            <button
                class="btn btn-primary ml-2"
                v-on:click="addGenre(currentGenre)"
            >
                Ajouter
            </button>
        </div>
        <div
            class="card card-body flex-row flex-wrap"
            v-if="addedGenres.length > 0"
        >
            <div
                class="genre d-flex align-items-center m-2"
                v-for="genre of addedGenres"
                :key="genre.id"
            >
                <div>{{ genre.name }}</div>
                <input type="hidden" :value="genre.id" />
                <button
                    class="btn btn-danger ml-2"
                    v-on:click="removeGenre(genre.id)"
                >
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        allGenres: {
            type: Array,
            required: true
        },
        gameGenres: {
            type: Array,
            default: []
        }
    },
    created() {
        for (let genre of this.allGenres) {
            console.log(genre.id);
            this.listGenres.push({ id: genre.id, name: genre.name });
        }
    },
    data: function() {
        return {
            listGenres: [],
            addedGenres: [],
            currentGenre: null
        };
    },
    methods: {
        addGenre(id) {
            if (this.listGenres.find(e => e.id == id)) {
                this.addedGenres.push(this.listGenres.find(e => e.id == id));
                this.listGenres.splice(
                    this.listGenres.indexOf(
                        this.listGenres.find(e => e.id == id)
                    ),
                    1
                );
            }
        },
        removeGenre(id) {
            if (this.addedGenres.find(e => e.id == id)) {
                this.listGenres.push(this.addedGenres.find(e => e.id == id));
                this.addedGenres.splice(
                    this.addedGenres.indexOf(
                        this.addedGenres.find(e => e.id == id)
                    ),
                    1
                );
            }
        }
    }
};
</script>
