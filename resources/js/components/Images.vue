<template>
    <div class="row mt-4">
        <div class="col-md-3">
            <upload-images></upload-images>
        </div>
        <div v-for="pics in pictures" :key="pics.id" class="col-md-3">
            <button type="button" class="close star" aria-label="Close">
                <span @click="setas(pics)"><i class="fa fa-star" :class="pics.dp?'text-yellow':''"></i></span>
            </button>
            <button type="button" class="close del" aria-label="Close">
                <span @click="trydel(pics)"><i class="fa fa-trash-o"></i></span>
            </button>
            <img class="img-fluid border rounded border-success shadow" :src="'/storage/'+pics.picture" loading="eager"  style="margin:10px" />
            <!-- <label style="text-align:center">{{ getfilename(pics.picture) }}</label> -->
        </div>
    </div>
    
            
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.getpics()
            this.$root.$on('updatepics', () => {
                this.getpics();
            })
        },
        data(){
            return{
                pictures:[]
            }
        },
        methods:{
            getpics(){
                axios.get('/admin/item/'+item+'/pics')
                .then((res)=>{
                    this.pictures=res.data;
                    console.log(this.pictures);
                    console.log('picsupader');

                })
                .catch((err)=>{
                    console.log(err.message)
                });
            },
            setas(pic){
                axios.patch('/admin/itempics/'+pic.id+'/setas')
                .then(res=>{
                    console.log(res);
                    alertify.success(res.data=='success'?'Display Picture set to '+this.getfilename(pic.picture):'Failed to change Display Picture',3);
                    this.getpics();
                })
                .catch(err=>{
                    alertify.error('error occured',3);
                })
            },
            trydel(pic){
                alertify.confirm(
                    'Confirmation',
                    'are you sure to delete <span class="text-red">'+this.getfilename(pic.picture)+'</span>',
                    ()=>{
                        axios.delete('/admin/itempics/'+pic.id+'/delete')
                        .then((res)=>{
                            console.log(res.data);
                            if(res.data.search('not')==-1)
                                alertify.success('picture deleted',3);
                            else
                                alertify.error('deleting failed',3);
                            this.getpics();
                        })
                        .catch((err)=>{
                            console.log(err);
                            alertify.error('error occured',3);
                        })
                    },
                    ()=>alertify.success('deleting cancelled',3)
                    )
                    .set('labels', {ok:'Hell Yeah!', cancel:'Hell No!'}); 
            },
            getfilename(str){
                return str.substr(str.lastIndexOf('/')+1);
            }
        }
    }
</script>
<style scoped>
.del{
    position: absolute;
    
    right: 5px;
    background:lightcoral;
    color: red;
    width: 30px;
    height:30px;
    border-radius: 50%;
    text-align: center;
    box-shadow: 0 0 0 0 #336699;
}
.star{
    position: absolute;
    right: 40px;
    background:cyan;
    color: gray;
    width: 30px;
    height:30px;
    border-radius: 50%;
    text-align: center;
    box-shadow: 0 0 0 0 #336699;
}
.text-yellow{
    color:yellow
}
</style>
