<template>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <router-link :to="{ name: 'SHOWADVERT', params: { id: advert.id }}">
        <div class="card">
            <img
                class="card-img-top main-content--img"
                style="height: 280px;width: 100%;display: block;" :src="advert['image-url']"
                alt="advert image">
            <div class="card-block">
                <p class="card-text">
                    {{advert.title}}
                </p>
            </div>
        </div>
        </router-link>
    </div>
</template>
<script>
export default {
    props: ['advert']
}
</script>
