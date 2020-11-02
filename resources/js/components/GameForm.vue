<template>
    <form>
        <div class="form-group d-flex" :class="{ empty: !currentGenre }">
            <select v-model="currentGenre" class="form-control">
                <option
                    :value="genre.id"
                    v-for="genre of listGenres"
                    :key="genre.id"
                    >{{ genre.name }}
                </option>
            </select>

            <button
                class="btn btn-primary ml-2"
                v-on:click="addGenre(currentGenre)"
            >
                Ajouter
            </button>
        </div>
        <div class="card card-body" v-if="addedGenres.length > 0">
            <div class="row">
                <div
                    class="genre d-flex align-items-center justify-content-between mb-2 col-12 col-md-6 col-lg-4"
                    v-for="genre of addedGenres"
                    :key="genre.id"
                >
                    <div>{{ genre.name }}</div>
                    <input type="hidden" :value="genre.id" />
                    <button
                        class="btn btn-danger"
                        v-on:click="removeGenre(genre.id)"
                    >
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    </form>
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
            default: function() {
                return [];
            }
        }
    },
    created() {
        for (let genre of this.allGenres) {
            this.listGenres.push({ id: genre.id, name: genre.name });
        }

        for (let genre of this.gameGenres) {
            this.addGenre(genre.id);
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
                this.addedGenres.unshift(this.listGenres.find(e => e.id == id));
                this.listGenres.splice(
                    this.listGenres.indexOf(
                        this.listGenres.find(e => e.id == id)
                    ),
                    1
                );
            }
            this.currentGenre = null;
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
            this.listGenres.sort((a, b) => a.id - b.id);
            this.currentGenre = null;
        }
    }
};
</script>

<style>
.empty {
    position: relative;
}

.empty::before {
    position: absolute;
    top: 0;
    left: 0;
    content: "Sélectionnez un genre...";
    padding: 0.5em 1em;
}
</style>
