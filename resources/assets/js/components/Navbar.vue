<template>
  <div>
      <nav class="nav has-shadow">
        <div class="nav-left">
          <a class="nav-item">
            <h5 class="title is-5">
                <router-link to="/">LitBurden</router-link>
            </h5>
          </a>
        </div>

        <!-- This "nav-toggle" hamburger menu is only visible on mobile -->
        <!-- You need JavaScript to toggle the "is-active" class on "nav-menu" -->
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>

        <!-- This "nav-menu" is hidden on mobile -->
        <!-- Add the modifier "is-active" to display it on mobile -->
        <div class="nav-right nav-menu">
          <a class="nav-item">
            <router-link to="/">Home</router-link>
          </a>

          <a class="nav-item">
              <span class="icon">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              My LitBurden
              <span class="icon is-small">
                  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
              </span>
          </a>

          <a class="nav-item" v-if="!authentic">
            <router-link to="/register">Register</router-link>
          </a>

          <a class="nav-item" v-if="!authentic">
            <router-link to="/login">Login</router-link>
          </a>
          <a @click.stop="logout" class="nav-item" v-if="authentic">
            LogeOut
          </a>
          <a class="nav-item">
              <a class="button is-medium is-primary">Post an Ad</a>
          </a>
        </div>
      </nav>
  </div>
</template>

<script>
    import auth from '../store/auth';
    import flashMessage from '../helpers/flashMessage';

    export default {
        created() {
            auth.initialize();
        },
        data () {
            return {
                auth: auth.state,
            }
        },
        computed: {
            authentic() {
                if (this.auth.api_token && this.auth.user_id) return true;
                return false;
            }
        },
        methods: {
            logout() {
                auth.remove();
                flashMessage.setSuccess('You have successfuly logged Out!');
                this.$router.push('/login');
            }
        }
    }
</script>
<style>
</style>
