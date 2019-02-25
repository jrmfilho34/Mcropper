

require('./bootstrap');

window.Vue = require('vue');

import Toasted from 'vue-toasted';
import Croppa from 'vue-croppa';

Vue.use(Toasted)
Vue.use(Croppa)

Vue.component('image-croppe', require('./components/Croppa.vue').default);


const app = new Vue({
    el: '#app',
            data: {
                 croppa: {},
                 dataUrl: ''
            },
            methods: {
                upload() {
                    if (!this.croppa.hasImage()) {
                        Vue.toasted.show('Selecione uma imagem', {
                           type: 'alert',
                           action: {
                                   text: 'X',
                                   onClick: function onClick(e, toastObject) {
                                   toastObject.goAway(0);
                                   }
                            }
                        })
                        return
                    }
                    
                    this.croppa.generateBlob((blob) => {
                        const file = this.croppa.getChosenFile();
                    	var url = file.name
                        var fd = new FormData()
                        fd.append('image', blob)
                        fd.append('url', url)
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: 'upload',
                            data: fd,
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            success: function(data) {
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
                             }
                        })
                    }) 
                }
            }
});
