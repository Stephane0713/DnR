<template>
    <div>
        <div class="form-group">
            <label class="sr-only" for="search">Username</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Chercher un jeu :</div>
                </div>
                <input
                    type="text"
                    class="form-control"
                    id="search"
                    placeholder="Titre du jeu..."
                    @keyup="searchGames()"
                    v-model="search"
                />
            </div>
            <div class="form-group">
                <label for="formControlRange">Example Range input</label>
                <input
                    type="range"
                    min="1"
                    :max="data.last_page"
                    class="form-control-range"
                    id="formControlRange"
                    @change="getGames()"
                    v-model="page"
                />
            </div>
        </div>
        <div class="row">
            <div
                class="col-12 col-md-6 col-lg-4"
                v-for="game of games"
                :key="game.id"
            >
                <div class="card card-body mb-3">{{ game.Title }}</div>
            </div>
            <div class="col-12">
                <!--En attendant-->
                <div class="alert alert-warning" v-if="games.length < 1">
                    Aucun résultat
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.getGames();
    },
    data: function() {
        return {
            data: {},
            games: [],
            page: 1,
            search: ""
        };
    },
    methods: {
        getGames() {
            axios
                .get(`api/games/get`, {
                    params: {
                        page: this.page,
                        name: this.search
                    }
                })
                .then(
                    response => (
                        (this.data = response.data),
                        (this.games = response.data.data)
                    )
                );
        },
        searchGames() {
            this.page = 1;
            this.getGames();
        }
    }
};
</script>

<style></style>
