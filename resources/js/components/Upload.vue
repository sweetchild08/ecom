<template>
    <div class="container">
      <!--UPLOAD-->
      <form enctype="multipart/form-data" novalidate>
        <!-- <h1>Upload images</h1> -->
        <div class="dropbox">
          <input type="file" multiple :name="uploadFieldName" :disabled="isSaving" @change="fileschange($event.target.name, $event.target.files); fileCount = $event.target.files.length"
            accept="image/*" class="input-file">
            <p v-if="isInitial">
              Drag your file(s) here to begin<br> or click to browse
            </p>
            <p v-if="isSaving">
              Uploading {{ fileCount }} files...
            </p>
        </div>
      </form>
       <div v-if="isSuccess">
        <h2>Uploaded {{ count }} file(s) successfully.</h2>
      </div>
      <!--FAILED-->
      <div v-if="isFailed">
        <h2>Uploaded failed.</h2>
        <p>
          <a href="javascript:void(0)" @click="reset()">Try again</a>
        </p>
        <pre>{{ uploadError }}</pre>
      </div>
  </div>
</template>

<script>
const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;
    export default {
        name:'upload-image',
        data(){
            return {
                uploadFieldName:'images[]',
                currentStatus : STATUS_INITIAL,
                count:0
            };
        },
        computed: {
            isInitial() {
                return this.currentStatus === STATUS_INITIAL;
            },
            isSaving() {
                return this.currentStatus === STATUS_SAVING;
            },
            isSuccess() {
                return this.currentStatus === STATUS_SUCCESS;
            },
            isFailed() {
                return this.currentStatus === STATUS_FAILED;
            },
            itemid() {
                return x;
            }
        },
        methods:{
            fileschange(filename,files){
                const formData = new FormData();

                if (!files.length) return;
                console.log(filename);

                // append the files to FormData
                Array
                .from(Array(files.length).keys())
                .map(x => {
                    console.log(files[x], files[x].name);
                    formData.append(filename, files[x], files[x].name);
                });

                // save it
                console.log(formData);
                this.save(formData);
            },
            save(formData){
                 this.currentStatus = STATUS_SAVING;
                
                console.log(formData.getAll('images'))
                axios.post( '/admin/item/'+item+'/addpicture',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                    ).then(res=>{
                        //let data = JSON.parse(res.data);
                        console.log(res.data);
                        console.log('SUCCESS!!');
                        this.count = res.data.success;
                        this.currentStatus = STATUS_SUCCESS;
                        this.$root.$emit('updatepics');
                        alertify.success("Uploaded "+this.count+" file(s) successfully.",1)
                        this.reset();
                    })
                    .catch((err)=>{
                        console.log(this.currentStatus);
                        console.log('FAILURE!!');
                        this.uploadError = err.response;
                        console.log(err.message);
                        this.currentStatus = STATUS_FAILED;
                    });
            },
            reset(){
                this.currentStatus = STATUS_INITIAL;
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.reset()
        }
    }
</script>
<style scoped>
    .dropbox {
    outline: 2px dashed grey; /* the dash box */
    outline-offset: -10px;
    background: lightcyan;
    color: dimgray;
    padding: 10px 10px;
    min-height: 100px; /* minimum height */
    position: relative;
    cursor: pointer;
    }

    .input-file {
    opacity: 0; /* invisible but it's there! */
    width: 100%;
    height: 200px;
    position: absolute;
    cursor: pointer;
    }

    .dropbox:hover {
    background: lightblue; /* when mouse over to the drop zone, change color */
    }

    .dropbox p {
    font-size: 1.2em;
    text-align: center;
    padding: 50px 0;
    }
</style>
