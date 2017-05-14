<template>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
            <img
                class="card-img-top"
                style="height: 280px;width: 100%;display: block;" :src="advert['image-url']"
                alt="advert image">
            <div class="card-block">
                <p class="card-text">
                    {{advert.title}}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['advert']
}
</script>
