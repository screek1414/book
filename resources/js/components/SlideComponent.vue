<template>
    <div class="container">
        <hooper :itemsToShow="1"
                :centerMode="true"
                pagination="no"
                :autoPlay="true"
                :playSpeed="3000"
                :transition="1500"
                :infiniteScroll="true"
        >
            <slide>
                <img src="https://avatars.mds.yandex.net/get-pdb/1348397/b1bf2bc4-9ea0-4e76-9ff4-856194ae7270/s1200?webp=false">
            </slide>
            <slide>
                <img src="https://avatars.mds.yandex.net/get-pdb/224463/d22117d9-eba4-4f6b-9a88-1a768b6bfd22/s1200?webp=false">
            </slide>
            <slide>
                <img src="https://s1.1zoom.ru/big0/344/292505-Sepik.jpg">
            </slide>

            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <hooper-pagination slot="hooper-addons"></hooper-pagination>
        </hooper>
    </div>
</template>

<script>
    import {
        Hooper,
        Slide,
        Navigation as HooperNavigation,
        Pagination as HooperPagination
    } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        name: 'App',
        components: {
            Hooper,
            Slide,
            HooperNavigation,
            HooperPagination
        }
    };
</script>

<style scoped>
    .hooper {
        height: 500px;
        box-shadow: 0 0 30px -5px #000080;
    }
    slide {
        margin-top: 150px;
    }
</style>
