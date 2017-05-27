<template>
    <div class="container">
        <SearchBar></SearchBar>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">{{ advert.title }}</h4>
                    <div class="row">
                        <p class="col-md-8"><i class="show--card__map-icon fa fa-map-marker" aria-hidden="true"></i> {{ advert.location }}</p>
                        <p class="col-md-4 card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <img class="img-fluid show--img mx-auto d-block" :src="advert['image-url']" alt="Advertisment Image">
                <div class="card-block show--card__advertiser-description">
                    <h4 class="card-title">Advertiser's description</h4>
                    <div class="row">
                        <p class="col card-text">Want: <p>{{ advert.want }}</p></p>
                        <p class="col card-text">Give: <p>{{ advert.give }}</p></p>
                    </div>
                    <p class="card-text">Description: </p>
                    <p>{{ advert.body}}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
          </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">Advertiser's Info</h4>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import { get } from '../../helpers/api';

export default {
    created() {
        get(`api/v1/ads/${this.$route.params.id}`)
            .then((res) => {
                this.advert = res.data;
                console.log(this.advert);
            })
            .catch((err) => {
                console.log(err);
            });
    },
    data() {
        return {
            advert: {}
        }
    }
}
</script>
