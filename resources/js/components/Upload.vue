
<template>
<div>
    <input type="file" name="image" @change="GetImage" accept="image/*">
    <img v-if="img" :src="avatar" alt="image" style=" height: 100px; width: 100px;">
    <a href="#" v-if="loaded" class="btn btn-success" @click.prevent="upload">Upload</a>
    <a href="#" v-if="loaded" class="btn btn-danger" @click.prevent="cancelar">Cancelar</a>
</div>
</template>
<script>
    export default {
        props:['user'],
        data(){
            return{
                avatar:null,
                loaded:false,
                img:false,
                nome: null
            }
            
        },
        methods:{
            GetImage(e){
                let image = e.target.files[0];
                this.nome= image.name;
                console.log(image);
                this.ler(image);
            },
            upload()
            {
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('nome',this.nome);

                axios.post('/upload',formData,config)
                .then(function (response) {
                  Vue.toasted.show('upload com sucesso',
                    {
                        type:'success',
                        action : {
                            text : 'X',
                            onClick : (e, toastObject) => {
                            toastObject.goAway(0);
                            }
                        }
                    });
                })
                .catch(function (error) {
                   console.log(error);
                });
            },
            ler(image){
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e =>{
                    this.avatar = e.target.result
                    
                }
                this.loaded = true
                this.img = true
            },
            cancelar(){
                this.avatar = this.user.avatar
                this.loaded = false
            }
        }
    }
</script>