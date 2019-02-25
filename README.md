# Jrmfilho23: Croppa vue

Guia básico para criar um componente com a api croppa, em conjunto com: vue.js e laravel 5.7. 

## Início

O ambiente de desenvolvimento utilizado é homestead, desta forma, todos os requisitos para uma aplicação laravel estão presentes. 
É instalado o Laravel Mix, uma ferramenta que facilita o desenvolvimento de aplicações

### Pré-requisitos

Para replicar está aplicação, é necessário um ambiente que esteja de acordo com os requisitos do Laravel 5.7.

### Instalação

Rode os seguintes comandos via npm

1 primeiro comando

```
npm install --save vue croppa
```

e

```
npm install vue-toasted --save
```

### Exemplo


```
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

```

## Desenvolvido com

* [Laravel](https://laravel.com/docs/5.7) - Framework
* [Vue](https://vuejs.org/) - vue
* [vue-croppa](https://github.com/zhanziyang/vue-croppa/blob/master/README.md#documentation) - vue-croppa


## Authors

* **Miliano Fernandes de Oliveira Junior** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)


## Agradecimentos

* Toda equipe do Laravel, vue, croppa ..

