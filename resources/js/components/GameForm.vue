<template>
  <div>
    <div class="form-group">
      <label for="name">Nom</label>
      <input type="text" name="name" :value="name" class="form-control" />
    </div>

    <div class="form-group">
      <label for="platform">Plateforme</label>
      <select class="form-control" id="platform">
        <option v-for="(platform, id) in platforms" :key="id" :value="id">
          {{ platform }}
        </option>
      </select>
    </div>

    <div class="form-group">
      <label for="release">Date de sortie</label>
      <input type="text" name="release" :value="date" class="form-control" />
    </div>

    <div class="form-group">
      <label for="publisher">Éditeur</label>
      <select class="form-control" id="publisher">
        <option v-for="(publisher, id) in publishers" :key="id" :value="id">
          {{ publisher }}
        </option>
      </select>
    </div>

    <div class="form-group">
      <label for="developer">Développeur</label>
      <select class="form-control" id="developer">
        <option v-for="(developer, id) in developers" :key="id" :value="id">
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
      <p v-for="genre in game_genres" :key="genre.name">{{ genre.name }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      name: this.game.Title,
      date: this.game.ReleaseDate,
    };
  },
  props: [
    "genres",
    "platforms",
    "publishers",
    "developers",
    "game_genres",
    "game",
  ],
};
</script>