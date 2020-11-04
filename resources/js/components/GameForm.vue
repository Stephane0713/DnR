<template>
    <div>
        <div class="form-group">
            <label for="Title">Nom du jeu</label>
            <input
                type="text"
                name="Title"
                id="Title"
                class="form-control"
                :value="title"
            />
        </div>

        <div class="form-group">
            <label for="idPlatform">Plateforme</label>
            <select
                name="idPlatform"
                id="idPlatform"
                class="form-control"
                v-model="platform"
            >
                <option
                    :value="platform.id"
                    v-for="platform of platforms"
                    :key="platform.id"
                    >{{ platform.name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="ReleaseDate">Date de sortie</label>
            <input
                type="text"
                name="ReleaseDate"
                id="ReleaseDate"
                class="form-control"
                :value="date"
            />
        </div>

        <div class="form-group">
            <label for="idPublisher">Éditeur</label>
            <select
                name="idPublisher"
                id="idPublisher"
                class="form-control"
                v-model="publisher"
            >
                <option
                    :value="publisher.id"
                    v-for="publisher of publishers"
                    :key="publisher.id"
                    >{{ publisher.name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="idDeveloper">Développeur</label>
            <select
                name="idDeveloper"
                id="idDeveloper"
                class="form-control"
                v-model="developer"
            >
                <option
                    :value="developer.id"
                    v-for="developer of developers"
                    :key="developer.id"
                    >{{ developer.name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="genres">Genres</label>
            <div class="d-flex" :class="{ empty: !currentGenre }">
                <select v-model="currentGenre" class="form-control" id="genres">
                    <option
                        :value="genre.id"
                        v-for="genre of listGenres"
                        :key="genre.id"
                        >{{ genre.name }}
                    </option>
                </select>

                <button
                    class="btn btn-primary ml-2"
                    v-on:click.prevent="addGenre(currentGenre)"
                >
                    Ajouter
                </button>
            </div>
        </div>
        <div class="card card-body" v-if="addedGenres.length > 0">
            <div class="row">
                <div
                    class="genre d-flex align-items-center justify-content-between mb-2 col-12 col-md-6 col-lg-4"
                    v-for="genre of addedGenres"
                    :key="genre.id"
                >
                    <div>{{ genre.name }}</div>
                    <input type="hidden" name="genres[]" :value="genre.id" />
                    <button
                        class="btn btn-danger"
                        v-on:click="removeGenre(genre.id)"
                    >
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">
            Envoyer
        </button>
    </div>
</template>

<script>
export default {
    props: {
        edit: {
            type: Boolean,
            required: true
        },
        game: {
            type: Object
        },
        gameGenres: {
            type: Array,
            default: function() {
                return [];
            }
        },
        allGenres: {
            type: Array,
            required: true
        },
        platforms: {
            type: Array,
            required: true
        },
        publishers: {
            type: Array,
            required: true
        },
        developers: {
            type: Array,
            required: true
        }
    },
    created() {
        this.currentGenre = null;

        if (this.edit) {
            this.title = this.game.Title;
            this.date = this.game.ReleaseDate;
            this.platform = this.game.idPlatform;
            this.publisher = this.game.idPublisher;
            this.developer = this.game.idDeveloper;
        }

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
            currentGenre: null,
            title: "",
            date: "",
            platform: "",
            publisher: "",
            developer: ""
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
