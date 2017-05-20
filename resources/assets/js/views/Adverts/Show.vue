<template>
    <div>
        {{ adverts.title }}
        <img :src="adverts['image-url']" alt="">
    </div>
</template>

<script>
import { get } from '../../helpers/api';

export default {
    created() {
        get(`api/v1/ads/${this.$route.params.id}`)
            .then((res) => {
                this.adverts = res.data;
                console.log(this.adverts);
            })
            .catch((err) => {
                console.log(err);
            });
    },
    data() {
        return {
            adverts: {}
        }
    }
}
</script>
