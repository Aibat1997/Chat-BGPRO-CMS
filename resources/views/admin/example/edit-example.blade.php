@extends('admin.layouts.layout')

@section('css')
<style>
    .active-top-show {
        background-color: #fff !important;
    }

    #nav-tabContent {
        padding-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-8 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">
                    Добавить
                </h3>
            </div>
            <div class="col-md-4 col-4 align-self-center text-right">
                <a href="/admin/example" class="btn btn-danger">Назад</a>
            </div>
        </div>
        <div class="row">
            @if(empty($example))
            <form class="col-lg-12 col-md-12 row" action="/admin/example" method="POST" enctype="multipart/form-data">
            @else
            <form class="col-lg-12 col-md-12 row" action="/admin/example/{{ $example->example_id }}" method="POST" enctype="multipart/form-data">
                @method('PUT') 
            @endif
                @csrf
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-block">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="box-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Русский</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">Казахский</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-contact" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">Английский</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="example_name_ru" value="{{ !empty($example) ? $example->example_name_ru : old('example_name_ru') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Краткое описание</label>
                                            <textarea name="example_short_desc_ru"
                                                class="form-control">{{ !empty($example) ? $example->example_short_desc_ru : old('example_short_desc_ru') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea id="editor" name="example_desc_ru">{{ !empty($example) ? $example->example_desc_ru : old('example_desc_ru') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="example_name_kz" value="{{ !empty($example) ? $example->example_name_kz : old('example_name_kz') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Краткое описание</label>
                                            <textarea name="example_short_desc_kz"
                                                class="ckeditor form-control">{{ !empty($example) ? $example->example_short_desc_kz : old('example_short_desc_kz') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea id="editor1" name="example_desc_kz">{{ !empty($example) ? $example->example_desc_kz : old('example_desc_kz') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="example_name_en" value="{{ !empty($example) ? $example->example_name_en : old('example_name_en') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Краткое описание</label>
                                            <textarea name="example_short_desc_en"
                                                class="ckeditor form-control">{{ !empty($example) ? $example->example_short_desc_en : old('example_short_desc_en') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Описание</label>
                                            <textarea id="editor2" name="example_desc_en">{{ !empty($example) ? $example->example_desc_en : old('example_desc_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Пользователи</label>
                                    <select class="form-control" name="user_id">
                                        @include('admin.layouts.users')
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Язык</label><br>
                                    <input class="form-check-input" id="ru" type="checkbox" value="ru"
                                        name="lang[]" {{ (!empty($example) && strpos($example->lang, 'ru') !== false) ? 'checked' : "" }}>
                                    <label for="ru">Русский</label>
                                    <input class="form-check-input" id="kz" type="checkbox" value="kz"
                                        name="lang[]" {{ (!empty($example) && strpos($example->lang, 'kz') !== false) ? 'checked' : "" }}>
                                    <label for="kz">Казахский</label>
                                    <input class="form-check-input" id="en" type="checkbox" value="en"
                                        name="lang[]" {{ (!empty($example) && strpos($example->lang, 'en') !== false) ? 'checked' : "" }}>
                                    <label for="en">Английский</label>
                                </div>
                                <div class="form-group">
                                    <label>Отображать</label><br>
                                    <input type="radio" class="form-check-input" name="is_show" value="1"
                                        id="is_show_yes" {{ (!empty($example) && $example->is_show == 1) ? "checked" : "checked" }}>
                                    <label class="form-check-label" for="is_show_yes">
                                        Да
                                    </label>
                                    <input type="radio" class="form-check-input" name="is_show" value="0"
                                        id="is_show_no" {{ (!empty($example) && $example->is_show == 0) ? "checked" : "" }}>
                                    <label class="form-check-label" for="is_show_no">
                                        Нет
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="box box-primary" style="padding: 30px; text-align: center">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="img-ru-tab" data-toggle="tab"
                                            href="#img-ru" role="tab" aria-controls="img-ru"
                                            aria-selected="true">Рус</a>
                                        <a class="nav-item nav-link" id="img-kz-tab" data-toggle="tab" href="#img-kz"
                                            role="tab" aria-controls="img-kz" aria-selected="false">Каз</a>
                                        <a class="nav-item nav-link" id="img-en-tab" data-toggle="tab" href="#img-en"
                                            role="tab" aria-controls="img-en" aria-selected="false">Анг</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="img-ru" role="tabpanel"
                                        aria-labelledby="img-ru-tab">
                                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                                            <img class="image-src" id="blah1" src="{{ !empty($example) ? $example->image_ru : old('image_ru') }}"
                                                style="width: 100%; " />
                                        </div>
                                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;">
                                        </div>
                                        <label class="btn btn-primary label-img" for="imgInp1">
                                            <input id="imgInp1" type="file" name="image_ru" class="d-none">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                    </div>
                                    <div class="tab-pane fade" id="img-kz" role="tabpanel" aria-labelledby="img-kz-tab">
                                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                                            <img class="image-src" id="blah2" src="{{ !empty($example) ? $example->image_kz : old('image_kz') }}"
                                                style="width: 100%; " />
                                        </div>
                                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;">
                                        </div>
                                        <label class="btn btn-primary label-img" for="imgInp2">
                                            <input id="imgInp2" type="file" name="image_kz" class="d-none">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                    </div>
                                    <div class="tab-pane fade" id="img-en" role="tabpanel" aria-labelledby="img-en-tab">
                                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                                            <img class="image-src" id="blah3" src="{{ !empty($example) ? $example->image_en : old('image_en') }}"
                                                style="width: 100%; " />
                                        </div>
                                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;">
                                        </div>
                                        <label class="btn btn-primary label-img" for="imgInp3">
                                            <input id="imgInp3" type="file" name="image_en" class="d-none">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 text-right">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                inpid = $(input).attr('id');
                inpid = inpid[inpid.length - 1];
                imgId = '#blah' + inpid;
                $(imgId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp1").change(function () {
        readURL(this);
    });
    $("#imgInp2").change(function () {
        readURL(this);
    });
    $("#imgInp3").change(function () {
        readURL(this);
    });
</script>
@endsection