<template>
    <div class="container-fluid">
        <section id="section1" >
            <span>Books</span>
        </section>
        <section id="section2">
                <div class="genre" v-for="(genre, index) in genres" :key="index">
                    <a :href="'books?genre=' + index">
                        <span>{{genre}}</span>
                    </a>
                </div>
                <div class="genre all_genres">
                    <a :href="'books/genres'">
                        <span>Все жанры</span>
                    </a>
                </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "HomePage",
        data() {
            return {
                genres: [],
            }
        },
        mounted() {
            this.init()
        },
        methods: {
            init() {
                window.axios.get(window.location.origin + '/genres')
                    .then((response) => {
                        this.genres = response.data.genres;
                })
            }
        }
    }
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY
        let e = document.querySelector('#navbar')
        e.style.backgroundColor = 'rgba(255, 255, 255, ' + scrolled / 300 + ')';
    })
</script>

<style scoped>
    body {
        box-sizing: border-box;
    }

    h3 {
        margin-top: 20px;
        margin-left: 10px;
    }

    section {
        height: 100vh;
    }
    #section1 {
        background-image: url("https://source.unsplash.com/1980x1280/?library");
        width: 100%;
        background-size: cover;
        box-shadow: 0 0 30px #000000;
    }
    #section1 span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 15em;
        font-weight: 900;
        color: white;
        text-shadow: 0 0 100px #000000;
    }

    .container-fluid {
        padding: 0;
        margin: 0;
    }

    #section2 {
        font-size: 32px;
        margin: 30px auto;
        height: 400px;
        width: 85%;
    }

    .genre {
        display: inline-flex;

        height: 200px;
        width: 24.8%;
    }

    .genre a {
        padding: 10px;
        color: #ffffff;
        width: 80%;
        height: 150px;
        text-transform: uppercase;
        margin: auto;
        text-shadow: 0 0 10px #000000;
        box-shadow: 0 0 50px #000000;
        transition: 0.2s;
    }

    .genre a span {
        text-align: center;
    }

    .genre a:hover {
        text-decoration: underline;
        text-shadow: 0 0 20px #000000;
        transition: 0.5s;
        box-shadow: 0 0 15px #000000;
    }

    .all_genres {
        transform: translateX(-8px);
    }

    .genre a {
        background-image: url("https://source.unsplash.com/eMP4sYPJ9x0/1600x900");
        background-size: cover;
    }
</style>
