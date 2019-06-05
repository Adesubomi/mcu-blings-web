<template>
    <div :class="allClasses">
        <div class="loader" id="loader-1"></div>
    </div>
</template>

<script>
    export default {
        components: {},
        props: ['cssClass'],
        data(){
            return {}
        },
        computed: {
            allClasses () {
                if ( this.cssClass ) return this.cssClass;
                // else return 'text-center';
            }
        },
        methods: {}
    }
</script>

<style scoped="">

    .loader {
        width: 14px;
        height: 14px;
        border-radius: 100%;
        position: relative;
        margin: 0 auto;
        padding: 0;
    }


    /* LOADER 1 */

    #loader-1:before,
    #loader-1:after {
        content: "";
        position: absolute;
        /*top: -10px;*/
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        border: 2px solid transparent;
        border-top-color: #3498db;
    }

    #loader-1:before {
        z-index: 100;
        animation: spin .4s infinite linear;
    }

    #loader-1:after {
        border: 1px solid #99a;
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

</style>