<template>
    <div>
        <button v-if="show" @click.prevent="unsave" type="submit" class="save">
            <i class="far fa-heart"></i><span>Unsave job</span></button>
<!--        <button type="submit" class="save"><i class="far fa-heart"></i><span>save job</span></button>-->
        <button v-else @click.prevent="save" type="submit" class="save"><i class="far fa-heart"></i><span>save job</span></button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: ['jobid', 'favourited'],
    data() {
        return {
            show: true
        };
    },
    mounted() {
        console.log('Component mounted.');
        this.show = this.jobFavourited ? true : false;
    },
    computed: {
        jobFavourited() {
            return this.favourited;
        }
    },
    methods: {
        save() {
            axios
                .post('/save/' + this.jobid)
                .then((response) => {
                    this.show = true;
                })
                .catch((error) => {
                    alert('Error');
                });
        },
        unsave() {
            axios
                .post('/unsave/' + this.jobid)
                .then((response) => {
                    this.show = false;
                })
                .catch((error) => {
                    alert('Error');
                });
        }
    }
};
</script>
