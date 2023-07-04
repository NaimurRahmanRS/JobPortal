<template>
    <div>
        <input type="text" class="input" placeholder="What do you want to see?" v-on:keyup="searchJob" v-model="keyword">

        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a style="color: black" :href="'/job/'+result.id+'/'+result.slug+'/'">
                        {{result.title}}<br>
                        <b style="color: blue">{{result.position}}</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data(){
        return{
            keyword: '',
            results: []
        }
    },
    methods:{
        searchJob(){
            this.results=[];
            if(this.keyword.length > 1){
                axios.get('/job/search', {params:{keyword: this.keyword}})
                    .then(response=>{
                        this.results=response.data
                    });
            }
        }
    }
}
</script>
