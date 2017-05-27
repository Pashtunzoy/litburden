<template>
    <div>
        <section class="jumbotron jumbotron-fluid">
            <!-- Hero content: will be in the middle -->
              <div class="container">
                <h1 class="display-3 text-center">Share. Give. Win.</h1>
                <p class="lead text-center">Australia's vibrant community one stop</p>
              </div>

            <!-- Hero footer: will stick at the bottom -->
            <SearchBar></SearchBar>
        </section>
        <div class="album text-muted">
            <div class="container">
                <div class="row">
                    <MainContent v-for="advert in this.adverts" :advert="advert" :key="advert.id"></MainContent>
                </div>
            </div>
        </div>
        <section class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <router-link to="/ads" class="btn btn-lg">See all</router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import SearchBar from '../components/SearchBar.vue';
import MainContent from '../components/MainContent.vue';
import { get } from '../helpers/api';
import flashMessage from '../helpers/flashMessage';

export default {
    created() {
        get('/api/v1/ads')
            .then((res) => {
                if (res.data && res.status === 200) {
                    this.adverts = res.data;
                }
            })
            .catch((err) => {
                flashMessage.error('Something went wrong!')
            });
    },
    data() {
        return {
            adverts: []
        }
    },
    components: {
      SearchBar,
      MainContent
    }
}
</script>
<style>
</style>
