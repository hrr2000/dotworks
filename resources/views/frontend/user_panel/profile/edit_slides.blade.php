
<div class="card">
    <div data-toggle="collapse" style="cursor:pointer;" data-target="#sliderImages" class="card-header d-flex">
        <div class="col-11">
            Slider Images
        </div>
        <div class="col-1 text-right">
            <i class="fa fa-caret-down"></i>
        </div>
    </div>

    <div id="sliderImages" class="card-body collapse">
        <button id="add-slide-btn" type="button" class="btn btn-outline-primary" data-toggle="modal"
                data-target="#add-slide">{{__('A D D')}} <i class="fa fa-plus"></i></button>
        <br />
        <br />
        <div id="slides-tbl" class="row">
            @foreach($slides as $slide)
                <div class="col-md-4 mt-2 mb-2" id="slide-item-{{ $slide->id }}">
                    <a style="text-decoration:none" id="slide-path-{{ $slide->id }}"
                       href="{{ url($slide->path().$slide->name) }}" target="_blank">
                        <img class="user-slides-panel" id="slide-img-{{ $slide->id }}"
                             src="{{ url($slide->path().$slide->name) }}">
                    </a>
                    <div class="user-slides-controllers">
                        <button type="button" class="btn slide-btn-edit" data-edit-id="{{ $slide->id }}"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn slide-btn-delete" data-delete-id="{{ $slide->id }}">
                            <i class="fa fa-trash"></i></button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<div id="add-slide" tabindex="-1" role="dialog" class="modal fade" aria-modal="true">
    <div role="document" class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a slide</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-slide-form" class="container" method="POST" action="{{ route('frontend.profile.slide.add') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group text-center">
                        <input class="form-control-file w-50" type="file" name="slide">
                    </div>
                    <div class="alert alert-warning">
                        please choose a wide image , preferred : 1300 x 400
                    </div>
                    <button type="submit" id="add-slide-form-btn" class="btn btn-primary w-100">Done
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="edit-slide" tabindex="-1" role="dialog" class="modal fade" aria-modal="true">
    <div role="document" class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Edit slide
                </h3>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-slide-form" class="container" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <input class="form-control-file w-50" type="file" name="slide">
                    </div>
                    <div class="alert alert-warning">
                        please choose a wide image , preferred : 1300 x 400
                    </div>
                    <button type="button" id="edit-slide-form-btn" class="btn btn-primary w-100">Done
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete slide Modal -->
<div class="modal fade" id="delete-slide" tabindex="-1" role="dialog" aria-labelledby="Delete a slide"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body container text-center">
                <h4>Are you sure to delete this Slide ?</h4><br>
                <div class="container">
                    <form id="delete-slide-form" method="POST" action="" style="display: inline;">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-success" id="delete-slide-form-btn"
                                data-dismiss="modal">Yes
                        </button>
                    </form>
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>






