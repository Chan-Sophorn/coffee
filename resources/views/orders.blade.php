@extends('layouts.app')
@section('title', 'Order')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-5 align-content-lg-center">
                        <img src="{{ asset('/images/profiles.png') }}" alt="profile" width="70px" height="70px">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-9">
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <p>Email:</p>
                            </div>
                            <div class="col-md-9 align-content-lg-start">
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="h3 text-center">Team Coffee</p>
            </div>
            <div class="col-md-4 m-auto text-right">
                <input type="button" id="" name="saveorder" value="NEW ORDER" class="btn btn-primary bt-order"
                    data-bs-toggle="modal" data-bs-target="#modelSave">
            </div>
        </div>
    </div>

    <div class="container con-table">
        <div class="row">
            <table class="table table-bordered text-center">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Sugar</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selects as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->sugar . '%' }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price . "$" }}</td>
                            <td>{{ $item->total . "$" }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a href="#" class="text-primary p-1">print</a>
                                <a href="#"><i class="far fa-edit "></i></a>
                                <a href="#" class=""><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-model">
                <div class="modal-header bg-primary bg-header-model">
                    <h5 class="modal-title text-white" id="exampleModalLabel">ADD NEW ORDER</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row mb-4">
                        <label for="coffeeName" class="col-md-4 col-form-label col-form-label-sm">Coffee Name</label>
                        <div class="col-sm-8">
                            <select id="inputState" class="form-select bg-input">
                                <option selected>Coffee Name...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="type" class="col-md-4 col-form-label col-form-label-sm">Type</label>
                        <div class="col-sm-8">
                            <select id="type" class="form-select bg-input">
                                <option selected>Type...</option>
                                <option selected>Ice</option>
                                <option selected>Hot</option>
                                <option selected>Frappe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="size" class="col-md-4 col-form-label col-form-label-sm">Size</label>
                        <div class="col-sm-7 bg-white radio-bg">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="large" value="" checked>
                                <label class="form-check-label" for="large">large</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="meduim" value="">
                                <label class="form-check-label" for="meduim">meduim</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="small" value="">
                                <label class="form-check-label" for="small">small</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="sugar" class="col-md-4 col-form-label col-form-label-sm">Sugar</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control bg-input" id="sugar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light bt-order" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary bt-order">Save Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection
