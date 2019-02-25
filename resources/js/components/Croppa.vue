<template>
 <croppa v-model="croppa"
         :width="650"
         :height="250"
         placeholder="Upload da imagem"
         placeholder-color="#3c3c3c"
         :placeholder-font-size="16"
         canvas-color="transparent"
         :show-remove-button="true"
         remove-button-color="red"
         :remove-button-size="24"
         :show-loading="true"
         :loading-size="53" 
         :prevent-white-space="true">
        <div class="col-xs-4">
          <div class="btn-group">
            <button class="btn btn-info btn-sm" @click="croppa.moveUpwards(10)">move up</button>
            <button class="btn btn-info btn-sm" @click="croppa.moveDownwards(10)">move down</button>
            <button class="btn btn-info btn-sm" @click="croppa.moveLeftwards(10)">move left</button>
            <button class="btn btn-info btn-sm" @click="croppa.moveRightwards(10)">move right</button>
            <button class="btn btn-info btn-sm" @click="croppa.rotate()">rotate 90deg</button>
            <button class="btn btn-info btn-sm" @click="croppa.rotate(2)">rotate 180deg</button>
            <button class="btn btn-info btn-sm" @click="croppa.rotate(-1)">rotate -90deg</button>
            <button class="btn btn-info btn-sm" @click="croppa.flipX()">flip horizontally</button>
            <button class="btn btn-info btn-sm" @click="croppa.flipY()">flip vertically</button>
            <button  class="btn btn-info btn-sm" @click="croppa.zoomIn()">zoom in</button>
            <button class="btn btn-info btn-sm" @click="croppa.zoomOut()">zoom out</button>
            <button class="btn btn-success btn-sm" @click="upload">UPLOAD</button>
          </div>
        </div>
 </croppa>
</template>

<script>
 /* export default {
           data: {
                 croppa: {}  
            },
            methods: {
                upload() {
                    if (!this.croppa.hasImage()) {
                        alert('Selecione uma imagem')
                        return
                    }
                    this.croppa.generateBlob((blob) => {
                        var fd = new FormData()
                        fd.append('image', blob, 'filename.jpg')
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
                            console.log(data);
                             }
                        })
                    }) 
                }
            }
    }*/
</script>