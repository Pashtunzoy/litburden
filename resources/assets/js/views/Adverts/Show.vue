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
                        <p class="col">Want: {{ advert.want }}</p>
                        <p class="col">Give: {{ advert.give }}</p>
                    </div>
                    <p class="card-text">Description: </p>
                    <p>{{ advert.body}}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ this.updatedAt }}</small></p>
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
import moment from 'moment';

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
    },
    computed: {
        updatedAt() {
            if (this.advert.updated_at) {
                var date = new Date(this.advert.updated_at);
                var day = date.getDate();
                var month = `0${date.getMonth() + 1}`;
                var year = date.getFullYear();
                var newDate = `${year}${month}${day}`;
                return moment(newDate, "YYYYMMDD").fromNow();
            }
        }
    }
}
</script>
