<template>
    <form>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" :value="name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="platform">Plateforme</label>
            <select class="form-control" id="platform">
                <option
                    v-for="(platform, id) in platforms"
                    :key="id"
                    :value="id"
                >
                    {{ platform }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="release">Date de sortie</label>
            <input
                type="text"
                name="release"
                :value="date"
                class="form-control"
            />
        </div>

        <div class="form-group">
            <label for="publisher">Éditeur</label>
            <select class="form-control" id="publisher">
                <option
                    v-for="(publisher, id) in publishers"
                    :key="id"
                    :value="id"
                >
                    {{ publisher }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="developer">Développeur</label>
            <select class="form-control" id="developer">
                <option
                    v-for="(developer, id) in developers"
                    :key="id"
                    :value="id"
                >
                    {{ developer }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="genres">Genres</label>
            <select class="form-control" id="genres">
                <option v-for="(genre, id) in genres" :key="id" :value="id">
                    {{ genre }}
                </option>
            </select>
            <div class="genres">
                <div class="card card-body">
                    <div class="row">
                        <div
                            v-for="(genre, index) in selectedGenres"
                            :key="genre.name"
                            class="col-12 col-md_6 col-lg-4"
                        >
                            <div class="genres__item">
                                {{ genre.name }}
                                <button
                                    class="btn btn-danger genres__btn"
                                    v-on:click.prevent="unselectGenre($event, index)"
                                >
                                    -
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
    </form>
</template>

<script>
export default {
    props: [
        "genres",
        "platforms",
        "publishers",
        "developers",
        "game_genres",
        "game_data"
    ],
    created() {
        if (this.game_data) {
            this.name = this.game_data.Title;
            this.date = this.game_data.ReleaseDate;
        }

        if (this.game_genres) {
            this.selectedGenres = this.game_genres;
        }
    },
    data: function() {
        return {
            name: "",
            date: "",
            selectedGenres: {}
        };
    },
    methods: {
        unselectGenre($event, index) {
            console.log(this.selectedGenres[index])
        }
    }
};
</script>
