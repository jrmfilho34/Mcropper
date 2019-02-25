@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <span class="text-danger">{{ $error}}</span>
                        @endforeach
                    @endif
                    <div id="ap">
                        <croppa v-model="croppa"
                             :input-attrs="{capture: true, class: 'file-input'}"
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
                        </croppa> 
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
