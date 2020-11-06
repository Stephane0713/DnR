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
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li
                        class="page-item"
                        :class="{ disabled: !data.prev_page_url }"
                    >
                        <a
                            class="page-link"
                            href="#"
                            @click.prevent="prevPage()"
                            >Prev</a
                        >
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link text-dark"
                            >Page {{ data.current_page }} sur
                            {{ data.last_page }}</a
                        >
                    </li>
                    <li
                        class="page-item"
                        :class="{ disabled: !data.next_page_url }"
                    >
                        <a
                            class="page-link"
                            href="#"
                            @click.prevent="nextPage()"
                            >Next</a
                        >
                    </li>
                </ul>
                <div v-if="games.length > 1" class="alert alert-success">
                    Nombre de résultats : {{ data.total }},
                    {{ games.length }} sur cette page.
                </div>
                <div class="alert alert-warning" v-else>
                    Aucun résultat
                </div>
            </nav>
        </div>
        <div class="row">
            <div
                class="col-12 col-md-6 col-lg-4"
                v-for="game of games"
                :key="game.id"
            >
                <div class="card card-body mb-3">
                    <h5
                        :title="game.Title"
                        class="card-title text-truncate font--pixel"
                    >
                        {{ game.Title }}
                    </h5>
                    <p class="card-text">{{ game.platform.name }}</p>
                    <div class="badges">
                        <span
                            v-for="genre of game.genres"
                            :key="genre.id"
                            class="badge badge-primary mb-2 mr-2 p-2"
                        >
                            {{ genre.name }}
                        </span>
                    </div>
                    <!--Je dois trouver comment passer name('games.show') à la place de games/+game.id-->
                    <a :href="'games/' + game.id" class="btn btn-primary"
                        >Details</a
                    >
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
        },
        nextPage() {
            if (this.page < this.data.last_page) {
                this.page++;
                this.getGames();
            }
        },
        prevPage() {
            if (this.page > 1) {
                this.page--;
                this.getGames();
            }
        }
    }
};
</script>

<style></style>
