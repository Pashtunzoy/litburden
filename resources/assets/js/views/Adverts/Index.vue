<template v-if="authentic">
  <div id="container">
    <MainContent v-for="advert in this.adverts" :advert="advert" :key="advert.id"></MainContent>
  </div>
</template>

<script>
import MainContent from '../../components/MainContent.vue';

const client = algoliasearch('44UZY1A1LY', '0d519a5c02efb12fa9918fc56454e360');
const index = client.initIndex('ads');

export default {
    mounted() {
        const searchText = this.$route.query.search;
        if (searchText) {
            index.search(searchText)
                .then((content) => {
                    if (content) {
                        return this.adverts = content.hits;
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
