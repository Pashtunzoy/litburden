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
                        <p class="card-text"><small class="text-muted">Last updated {{ this.updatedAt }}</small></p>
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
                </div>
            </div>
          </div>
        <div class="col-md-4">
            <div class="card show--card--sidebar">
                <div class="card-block">
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-user-circle fa-6" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <p>User</p>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="btn btn-success show--card--message-button"
                        data-toggle="modal"
                        data-target="#sendMessageModal"
                        data-whatever="@mdo">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            Send Message
                    </button>
                </div>
            </div>
        </div>
        </div>
        <div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col">
                            <input class="form-control" type="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col">
                            <input class="form-control" type="email" name="name" placeholder="Email">
                        </div>
                    </div>
                  <div class="form-group">
                    <textarea
                        class="form-control"
                        id="message-text"
                        placeholder="Type a detailed message here..."
                        rows="10"
                        cols="30">
                    </textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import { get } from '../../helpers/api';
import SearchBar from '../../components/SearchBar.vue';
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
    components: {
      'SearchBar': SearchBar
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
