<template v-if="authentic">
  <div id="container">
    <MainContent v-for="advert in this.adverts" :advert="advert" :key="advert.id"></MainContent>
  </div>
</template>

<script>
import MainContent from '../../components/MainContent.vue';
import { get } from '../../helpers/api';

export default {
    mounted() {
        const searchText = this.$route.query.search;
        if (searchText) {
            get(`/api/v1/search?q=${searchText}`)
                .then((res) => {
                    if (res) {
                        return this.adverts = res.data;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    },
    data() {
        return {
            adverts: []
        }
    },
    components: {
      MainContent
    }
}
</script>
