<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-dark" id="ModalSaluranTitle">Saluran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body overflow-auto mb-1">
        @foreach($view_product_3 as $p)
        <div class="row">
            <div class="col-4">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="text-dark">
                            <td class="align-middle col-12">
                                <img src="{{$p -> pic_product}}" width="100%" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="text-dark">
                            <td class="align-middle text-center text-uppercase bg-light" colspan="3">
                                {{$p -> name_product}}
                            </td>
                        </tr>
                        <tr class="text-dark row">
                            <td class="align-middle col-2">Ukuran</td>
                            <td class="align-middle col-1"> : </td>
                            <td class="align-middle col-9">{{$p -> size_product}} cm</td>
                        </tr>
                        <tr class="text-dark row">
                            <td class="align-middle col-2">Berat</td>
                            <td class="align-middle col-1"> : </td>
                            <td class="align-middle col-9">{{$p -> weight_product}} Kg</td>
                        </tr>
                        <tr class="text-dark row">
                            <td class="align-middle col-2">Warna</td>
                            <td class="align-middle col-1"> : </td>
                            <td class="align-middle col-9">
                                @if($p -> color_product == 1)
                                <span class="text-secondary">Abu - Abu</span>
                                @elseif($p -> color_product == 12)
                                <span class="text-secondary">Abu - Abu</span>
                                <span class="text-dark">/</span>
                                <span class="text-danger">Merah</span>
                                @elseif($p -> color_product == 123)
                                <span class="text-secondary">Abu - Abu</span>
                                <span class="text-dark">/</span>
                                <span class="text-danger">Merah</span>
                                <span class="text-dark">/</span>
                                <span class="text-dark">Hitam</span>
                                @elseif($p -> color_product == 2)
                                <span class="text-danger">Merah</span>
                                @elseif($p -> color_product == 23)
                                <span class="text-danger">Merah</span>
                                <span class="text-dark">/</span>
                                <span class="text-dark">Hitam</span>
                                @elseif($p -> color_product == 3)
                                <span class="text-dark">Hitam</span>
                                @else
                                <span class="text-dark">-</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row p-3">
        {{$view_product_3 -> links('vendor.pagination.custom')}}
    </div>
    <div class="modal-footer text-dark">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
    </div>
</div>
