<template v-if="authentic">
  <div id="container">
    <MainContent v-for="advert in this.adverts" :advert="advert" :key="advert.id"></MainContent>
  </div>
</template>

<script>
import MainContent from '../../components/MainContent.vue';
import { post } from '../../helpers/api';

const client = algoliasearch('44UZY1A1LY', '0d519a5c02efb12fa9918fc56454e360');
const index = client.initIndex('ads');

export default {
    mounted() {
        const searchText = this.$route.query.search;
        if (searchText) {
            post('/api/v1/search', searchText)
                .then((res) => {
                    if (res) {
                        console.log(res);
                        // return this.adverts = res.hits;
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
