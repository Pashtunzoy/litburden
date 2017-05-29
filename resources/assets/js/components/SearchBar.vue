<template>
    <div class="container push-to-bottom search-bar">
        <div class="input-group input-group-lg">
            <input
                class="form-control"
                type="text"
                v-model="searchText"
                placeholder="I'm looking for..."
                aria-describedby="search place"
            >
            <span class="input-group-btn" id="search button">
                <router-link class="btn btn-primary btn-lg" :to="{ name: 'ADVERTS', query: { search: this.searchText}}">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </router-link>
            </span>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            searchText: ''
        }
    }
}
</script>
