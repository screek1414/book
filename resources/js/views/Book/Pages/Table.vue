<template>
<!--    <div class="container-fluid">-->
<!--        <input type="text"-->
<!--               v-model="search_word"-->
<!--               placeholder="Search"-->
<!--               class="mt-1 mb-1 form-control"-->
<!--               style="width: 30%"-->
<!--               @keyup.enter="setupPagination"-->
<!--        >-->

<!--        <div class="d-inline-block" v-for="book in items">-->
<!--            <div class="card_book ">-->
<!--                <div class="image_book">-->
<!--                    <router-link-->
<!--                        :to="'/book/show/' + book.id">-->
<!--                        <img :src="book.img" :alt="book.title">-->

<!--                    </router-link>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <paginate-->
<!--            :page-count="pageCount"-->
<!--            :click-handler="changePage"-->
<!--            :prev-text="'  <  '"-->
<!--            :next-text="'  > '"-->
<!--            :container-class="'pagination'"-->
<!--            :page-class="'page-item'"-->
<!--            :page-link-class="'page-link'"-->
<!--            :prev-link-class="'page-link'"-->
<!--            :prev-class="'page-item'"-->
<!--            :next-link-class="'page-link'"-->
<!--            :next-class="'page-item'"-->
<!--        />-->
<!--    </div>-->
        <div class="main_books" style="width: 90%; margin: 0 auto">
            <div class="col d-flex">
                <input type="text"
                       v-model="search_word"
                       placeholder="Search"
                       class=" mb-5 p-4 form-control"
                       style="width: 70%;"
                       @keyup.enter="setupPagination"
                >
                <button
                    class="btn btn-outline-secondary p-2 ml-2 mb-5"
                    @click="setupPagination"
                >Отправить
                </button>
            </div>
            <div class="row justify-content-around">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 pl-2 pr-2 mt-2 mb-2 d-flex"
                     v-for="book in items"
                     :key="book.id">
                    <div class="card align-items-stretch border-info"
                         style="width: 350px; margin: 0 auto;">
                        <img :src="book.img"
                             alt=""
                             class="card-img-top"
                             style="height: 30rem; object-fit: cover; flex-wrap: wrap-reverse; padding: 20px"
                        >
                        <ul class="list-group list-group-flush p-2">
                            <li class="list-group-item"><b>Название:</b> {{book.title}}</li>
                            <li class="list-group-item"><b>Автор:</b> {{book.author}}</li>
                        </ul>
                        <div class="card-body">
                            <router-link
                                :to="'/book/show/' + book.id"
                            >Подробнее...
                            </router-link>
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-center pagination">

                <paginate
                    :value="page"
                    :page-count="pageCount"
                    :click-handler="changePage"
                    :prev-text="'  <  '"
                    :next-text="'  > '"
                    :container-class="'pagination'"
                    :page-class="'page-item'"
                    :page-link-class="'page-link'"
                    :prev-link-class="'page-link'"
                    :prev-class="'page-item'"
                    :next-link-class="'page-link'"
                    :next-class="'page-item'"
                />
            </div>
        </div>
</template>

<script>
    import BasePagination from '../../../components/BasePagination';
    import paginationMixin from '../../../mixin/pagination.mixin'

    export default {
        name: "BookTable",
        mixins: [paginationMixin],
        components: {
            BasePagination
        }
    }
</script>

<style scoped>
    .image_book {
        width: 20%;
        height: 600px;
    }
    img {
        width: 100%;
        height: 100%;
    }

@keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.card {
    animation: fade-in .9s ease;
}

</style>
