<template>
    <div>
        <section class="search-area hero">
            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Share. Give. Win.
                    </h1>
                    <h2 class="subtitle">
                        Australia's vibrant community one stop
                    </h2>
                </div>
            </div>

            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
                <nav class="tabs">
                    <div class="container is-overlay">
                        <article class="notification is-dark">
                            <SearchBar></SearchBar>
                        </article>
                    </div>
                </nav>
            </div>
        </section>

        <section class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <router-link to="/ads" class="button is-medium">See all</router-link>
                </div>
            </div>
        </section>

    </div>
</template>
