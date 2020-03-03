<template>
    <div class="container">
        <div class="row book border-info p-3">
            <div class="col-4 justify-content-lg-start ">
                <img height="500px" width="100%" style="object-fit: cover" :src="book.img" :alt="book.title">
            </div>
            <div class="col-8">
                <div class="text-justify" style="text-indent: 30px">
                    <p class="m-0"><b>Название:</b></p>
                    <p>{{book.title}}</p>
                    <p class="m-0"><b>Автор:</b></p>
                    <p>{{book.author}}</p>
                    <p class="m-0"><b>Описание:</b></p>
                    <p>{{book.description}}</p>
                </div>
            </div>
            <div class="col-12 pt-2">
                <button @click="back()"
                        class="btn btn-outline-secondary"
                >Назад</button>
                <router-link
                    @click="back"
                >Назад</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookView",
        data() {
            return {
                book: [],
            }
        },
        mounted() {
            this.init()
        },
        methods: {
            init() {
                window.axios.get(window.location.origin + '/book/show', {id: this.$route.params.id})
                    .then((response) => {
                        this.book = response.data.book
                        console.log($route.query)
                    });
            },
            back() {
                window.axios.post(window.location.origin + 'back')
            }
        }
    }
</script>

<style scoped>
.book {
    background-color: #fff;
    border-radius: 5px;
    font-size: 18px;
}
</style>
