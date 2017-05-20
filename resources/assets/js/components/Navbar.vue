<template>
    <div>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
          <!-- This "navbar-toggle" hamburger menu is only visible on mobile -->
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

        <router-link class="navbar-brand" to="/">LitBurden</router-link>


        <!-- This "nav-menu" is hidden on mobile -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <router-link class="nav-link" to="/">Home</router-link>
             </li>
             <li class="nav-item">
                 <a href="#" class="nav-link">My LitBurden</a>
             </li>
             <li class="nav-item" v-if="!authentic">
               <router-link class="nav-link" to="/register">Register</router-link>
             </li>
             <li class="nav-item" v-if="!authentic">
               <router-link class="nav-link" to="/login">Login</router-link>
             </li>
             <li @click.stop="logout" class="nav-item" v-if="authentic">
               <a href="#" class="nav-link">Logout</a>
             </li>
             <li>
                 <router-link :to="shouldIReRoute" class="btn btn-sm btn-success nav-link">Post an Ad</router-link>
             </li>
           </ul>
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
            },
            shouldIReRoute() {
                if (this.authentic) {
                    return '/ad/new';
                }
                return '/login';
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
