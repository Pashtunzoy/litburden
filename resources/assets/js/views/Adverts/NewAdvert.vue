<template>
  <div class="container">
      <form class="new-ad-form" @submit.prevent="postAnAdvert">
          <h2 class="form-signin-heading text-center">Post A New Ad</h2>
          <div class="form-group row">
              <label for="title" class="col-2 col-form-label">Title</label>
              <div class="col-10">
                <input
                    class="form-control"
                    type="text"
                    v-model="form.title"
                    placeholder="Title of Your Advert"
                    id="title"
                    required
                    autofocus
                >
              </div>
            </div>
            <div class="form-group row">
              <label for="location" class="col-2 col-form-label">Location</label>
              <div class="col-10">
                <input
                    class="form-control"
                    type="search"
                    v-model="form.location"
                    placeholder="Type your here suburb, followed by state and country"
                    id="location"
                    required
                >
              </div>
            </div>
            <div class="form-group row">
              <label for="imageUrl" class="col-2 col-form-label">Image Url</label>
              <div class="col-10">
                <input
                    class="form-control"
                    type="url"
                    v-model="form['image-url']"
                    placeholder="Your image url goes here" id="imageUrl"
                    required
                >
              </div>
            </div>
            <div class="form-group row">
              <label for="want" class="col-2 col-form-label">Want to Learn</label>
              <div class="col-10">
                <input
                    class="form-control"
                    type="text"
                    v-model="form.want"
                    placeholder="What do you want or learn"
                    id="want"
                    required
                >
              </div>
            </div>
            <div class="form-group row">
              <label for="give" class="col-2 col-form-label">To Give</label>
              <div class="col-10">
                <input
                    class="form-control"
                    type="text"
                    v-model="form.give"
                    placeholder="What do you want to trade in return" id="give"
                    required
                >
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2 col-form-label">Description</label>
              <div class="col-10">
                <textarea
                    class="form-control"
                    v-model="form.body"
                    placeholder="Tell us a little more about your Advertisment"
                    id="description"
                    required>
                </textarea>
              </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-10">
                    <button
                        type="submit"
                        class="btn btn-success">
                        Submit
                    </button>
                </div>
            </div>
      </form>
  </div>
</template>

<script>
import { post } from '../../helpers/api';
import flashMessage from '../../helpers/flashMessage';

export default {
    data() {
        return {
            form: {
                title: '',
                location: '',
                "image-url": '',
                want: '',
                give: '',
                body: ''
            }
        }
    },
    methods: {
      postAnAdvert() {
        this.isFetching = true;
        this.error = {};
        post('/api/v1/ads', this.form)
            .then((res) => {
                if (res.data) {
                    flashMessage.setSuccess('You have successfuly logged In!');
                    flashMessage.removeError();
                    this.$router.push('/');
                }
                this.isFetching = false;
            })
            .catch((err) => {
                const msg = err.response.data.msg;
                msg ?
                    flashMessage.setError(msg):
                    flashMessage.setError('Sorry, There was error while posting your Ad!');
                flashMessage.removeSuccess();
                this.error = err.response.data;
                this.isFetching = false;
            });
      }
    }
}
</script>
<style>
</style>
