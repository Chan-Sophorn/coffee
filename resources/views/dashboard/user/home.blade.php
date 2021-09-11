@extends('layouts.app')
@section('title', 'Order')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                {{-- <div class="row">
                    <div class="col-md-5 align-content-lg-center">
                        <img src="{{ asset('/images/profiles.png') }}" alt="profile" width="70px" height="70px">
                    </div>

                </div> --}}
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
            <div class="col-md-4 text-center ">
                <img src="{{ asset('/images/teamcoffee.jpg') }}" alt="profile" width="200px" height="200px"
                    class="___class_+?14___">
            </div>
            <div class="col-md-4 m-auto text-right">
                <input type="button" id="" name="saveorder" value="NEW ORDER" class="btn btn-primary bt-order"
                    data-bs-toggle="modal" data-bs-target="#modelSave">
            </div>
        </div>
    </div>

    {{-- <div class="container con-table">
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
                    @if ($readsOrder->count() > 0)
                        @foreach ($readsOrder as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->CoffeeName->name }}</td>
                                <td>{{ $item->CoffeeType->name }}</td>
                                <td>{{ $item->Cup->name }}</td>
                                <td>{{ $item->sugar . '%' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price . "$" }}</td>
                                <td>{{ $item->total . "$" }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="#" class="text-primary p-1">print</a>
                                    <a href="#"><i class="far fa-edit "></i></a>
                                    <a href="#" class="___class_+?23___"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div> --}}


    {{-- <!-- Modal -->
    <div class="modal fade" id="modelSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-model">
                <div class="modal-header bg-primary bg-header-model">
                    <h5 class="modal-title text-white" id="exampleModalLabel">ADD NEW ORDER</h5>
                </div>
                <form action="{{ route('user.storeOrder') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <label for="coffeeName" class="col-md-4 col-form-label col-form-label-sm">Coffee Name</label>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-select bg-input" name="coffee">
                                    <option selected>Coffee Name...</option>
                                    @foreach ($coffee as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="type" class="col-md-4 col-form-label col-form-label-sm">Type</label>
                            <div class="col-sm-8">
                                <select id="type" class="form-select bg-input" name="type">
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="size" class="col-md-4 col-form-label col-form-label-sm">Size</label>
                            <div class="col-sm-7 bg-white radio-bg">
                                @foreach ($size as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" value="{{ $item->id }}"
                                            checked>
                                        <label class="form-check-label" for="large">{{ $item->name }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="qty" class="col-md-4 col-form-label col-form-label-sm">Quatity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control bg-input" id="qty" name="qty">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sugar" class="col-md-4 col-form-label col-form-label-sm">Sugar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control bg-input" id="sugar" name="sugar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light bt-order" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bt-order">Save Order</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}

    {{-- Add dynamic input --}}
    <div class="container con-table">
        <form action="">
            <section>
                <div class="row panel panel-item">
                    <table class="table table-bordered text-center">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Qty</th>
                                <th>Sugar</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th><a href="#" id="add_row"><i class="fas fa-plus text-white"></i></a></th>
                            </tr>
                        </thead>
                        <tbody id="tbody" style="background: rgb(224, 222, 222)">
                            {{-- <tr>
                                <td style="width: 200px;">
                                    <div>
                                        <select class="form-select form-control" name="coffee[]">
                                            <option selected>Coffee Name...</option>
                                            @foreach ($coffee as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td style="width: 200px;">
                                    <div>
                                        <select id="type" class="form-select " name="type">
                                            @foreach ($type as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 200px;">
                                    <div>
                                        <select id="type" class="form-select " name="type">
                                            @foreach ($type as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 200px;">
                                    <div>
                                        <select id="type" class="form-select " name="type">
                                            @foreach ($type as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td style="width: 200px;">
                                    <div>
                                        <select id="type" class="form-select " name="type">
                                            @foreach ($type as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-small remove"><i class="fas fa-minus"></i></a>
                                </td>
                            </tr> --}}

                        </tbody>
                        <tfoot>
                            <tr style="background: rgb(238, 238, 238)">
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <th>Total</th>
                                <td> <span class="total"></span></td>
                                <td><a href="#" class="btn btn-success btn-small" id="SaveOrder" style="width: 100px;">
                                        Saves</a></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
        </form>
    </div>



    <!-- Modal Save -->
    <div class="modal fade" id="modelSave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-model">
                <div class="modal-header bg-primary bg-header-model">
                    <h5 class="modal-title text-white" id="exampleModalLabel">ADD NEW ORDER</h5>
                </div>
                <form action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-4">
                            <label for="coffeeName" class="col-md-4 col-form-label col-form-label-sm">Coffee Name</label>
                            <div class="col-sm-8">
                                <select class="form-select bg-input" name="coffee" id="coffee_name">
                                    <option selected>Coffee Name...</option>
                                    @foreach ($coffee as $item)
                                        <option value="{{ $item->id.'-'.$item->price.'-'.$item->name }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="type" class="col-md-4 col-form-label col-form-label-sm">Type</label>
                            <div class="col-sm-8">
                                <select id="type" class="form-select bg-input" name="type">
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id.'-'.$item->price.'-'.$item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="size" class="col-md-4 col-form-label col-form-label-sm">Size</label>
                            <div class="col-sm-7 bg-white radio-bg">
                                @foreach ($size as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="size" value="{{ $item->id.'-'.$item->price.'-'.$item->name }}"
                                            checked>
                                        <label class="form-check-label" for="large">{{ $item->name }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="qty" class="col-md-4 col-form-label col-form-label-sm">Quatity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control bg-input" id="qty" name="qty">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="sugar" class="col-md-4 col-form-label col-form-label-sm">Sugar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control bg-input" id="sugar" name="sugar">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light bt-order" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary bt-order" id="addRow">Save
                            Order</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('js')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            var all_orders = [];
            var id= 1;
            var coffe_order = {
                id: 0,
                type: {id: 0,name: '', price: 0},
                size: {
                    id: 0,
                    name: '',
                    price: ''
                },
                qty: 0,
                sugar: 0,
                coffee_type: {
                    id: 0,
                    name:0,
                    price: 0
                },
                price: 0

            };

            $('#addRow').click(function() {
                addRow();
            });
            $('#SaveOrder').click(function() {
                      var data={
                        orders: all_orders,

                    "_token": "{{csrf_token()}}",
            };
            let route = '{{url("user/storeOrder")}}'
            $.post(route,data,function(resspone){
                if(resspone){
                    let my_tr = ''
                    all_orders.forEach(i=> {
                        my_tr +=`
                            <tr>
                                <td>${i.coffee_type.name}</td>
                                <td>${i.type.name} </td>
                                <td>${i.size.name} </td>
                                <td>${i.qty }</td>
                                <td>${i.sugar} </td>
                                <td>${((parseFloat(i.coffee_type.price) + parseFloat(i.type.price) + parseFloat(i.size.price))).toFixed(2)} </td>
                                <td>${i.price }</td>
                            </tr >
                        `;
                    })
                    let contents = `
                        <html>
                        <header>
                        <style>
                            * {
                            -webkit-print-color-adjust: true;
                            -webkit-print-color-adjust: exact;
                            }
                            @page {
                                size: A2;
                            }

                            body {
                                -webkit-print-color-adjust: exact;
                                font-family: 'Niradei-Regular' !important;
                                print-color-adjust: exact;
                                background-color: red;
                            }
                            ul,li {
                                list-style-type: inherit !important;
                                margin: 0 0 0 15px;
                                padding: 0 !important;
                            }
                            ul li>ul{
                                list-style-type: circle !important;
                                margin: 0 0 0 15px;
                                padding: 0 !important;
                            }
                            table,tr,td{
                                border-collapse: collapse !important;
                            }
                            table{
                                width:100%;
                            }
                            @media print {
                                html, body {
                                    font-family: 'Niradei-Regular'  !important;
                                    -webkit-print-color-adjust: exact !important;
                                    print-color-adjust: exact;
                                },
                                .pagebreak {
                                    clear: both;
                                    margin-top: 30mm;
                                    page-break-before: always !important;
                                    page-break-after: always !important;
                                }
                            }
                            table th{
                                padding: 8px 6px !important ;
                                border: 1px solid  #000;
                                border-collapse: collapse;
                            }
                            table{
                                width: 100%;
                                margin-top: 8px;
                                margin-bottom: 8px;
                                border-collapse: collapse;
                            }
                            .items tr td{
                                border: 0.7px solid #000;
                                padding: 6px;
                                height: 32px;
                            }
                            .items_tb_border tr td{
                                border: 1px solid #000;
                                padding: 6px;
                                height: 32px;
                            }
                            .flex{
                                display: flex;
                            }
                            .tleft{
                                text-align: left;
                            }
                            .tright{
                                text-align: right;
                            }
                            .text-bold{
                                font-weight: bold;
                            }
                            .text-center{
                                text-align: center;
                            }
                            p{
                                line-height: 15px;
                                font-family: 'Niradei-Regular' !important;
                            }
                        </style>
                        </header>
                        <body>
                            <table>
                               ${my_tr}
                            </table>
                        </body>
                        </html>
                    `;

                    var frame1 = document.createElement('iframe');
                    frame1.name = "frame1";
                    frame1.style.position = "absolute";
                    frame1.style.top = "-1000000px";
                    document.body.appendChild(frame1);
                    var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
                    frameDoc.document.open();
                    frameDoc.document.write(contents);
                    frameDoc.document.close();
                    setTimeout(function () {
                        //   window.frames["frame1"].focus();
                        window.frames["frame1"].print();
                        document.body.removeChild(frame1);
                        window.location.reload();
                    }, 300);

                }
            });
            });


            $('tbody').on('click', '#remove', function() {
                    var item_id = $(this).data('id');
                    console.log(item_id)
                    // let index = all_orders.findIndex(item => item.coffee_type.id == item_id);
                    // console.log(index,'Index',item_id,'reomve item_id');
                    // all_orders.splice(index,1);
                    let fillter = all_orders.filter((item) => {
                        if(parseInt(item.id) !== parseInt(item_id)){
                            return item;
                        }
                    });
                    all_orders = fillter;
                    var total = 0;
                    all_orders.forEach(item=>{
                        console.log(item.price);
                        total = total + parseFloat(item.price);
                    });
                    $('.total').text(total.toFixed(2));
                    console.log(fillter,'have remvoe');
                    $(this).parent().parent().remove();


            });

               // $('tbody').on('click', '#remove', function() {
            //         $(this).parent().parent().remove();
            //         console.log($(this).parent().parent().children());

            //         // alert();
            // });


            function addRow() {
                // var coffee_name = document.getElementById('coffee_name').value;
                id++;
                coffe_order.id = id;
                let getTypeOfCoffee =  $( "#coffee_name option:selected").val().split('-');
                console.log(getTypeOfCoffee, "get prince");

                coffe_order.coffee_type.id = getTypeOfCoffee[0];
                coffe_order.coffee_type.price = getTypeOfCoffee[1];
                coffe_order.coffee_type.name = getTypeOfCoffee[2];
                // get Coffe type
                // type

                let cofeeType =  $( "#type").val().split('-');
                coffe_order.type.id     = cofeeType[0];
                coffe_order.type.price   = cofeeType[1];
                coffe_order.type.name  = cofeeType[2];
                console.log(cofeeType, 'Coffe Type');
                // size
                let cofeeSize =  $( "#size").val().split('-');
                console.log(cofeeSize, 'Cofffe Size');
                coffe_order.size.id     = cofeeSize[0];
                coffe_order.size.price   = cofeeSize[1];
                coffe_order.size.name  = cofeeSize[2];

                coffe_order.qty =   $( "#qty").val();
                coffe_order.sugar = $( "#sugar").val();
                coffe_order.price =  (parseFloat(coffe_order.qty)*(parseFloat(coffe_order.coffee_type.price) + parseFloat(coffe_order.type.price) + parseFloat(coffe_order.size.price))).toFixed(2);

                console.log("total price",  coffe_order.price);

                var tr = '<tr>' +
                    '<td>' + coffe_order.coffee_type.name  + '</td>' +
                    '<td>' + coffe_order.type.name  + '</td>' +
                    '<td>' + coffe_order.size.name  + '</td>' +
                    '<td>'+ coffe_order.qty + '</td>' +
                    '<td>'+ coffe_order.sugar + '</td>' +
                    '<td>'+ ((parseFloat(coffe_order.coffee_type.price) + parseFloat(coffe_order.type.price) + parseFloat(coffe_order.size.price))).toFixed(2) + '</td>' +
                    '<td>'+ coffe_order.price + '</td>' +
                    '<td><a href="#" id="remove" data-id='+coffe_order.id+'><i class="fas fa-trash text-danger"></i></a></td>' +
                    '</tr >';
                $('#tbody').append(tr);
                console.log(coffe_order,'order itme');
                all_orders.push(coffe_order)
                var total = 0;
                all_orders.forEach(item=>{
                    console.log(item.price);
                    total = total + parseFloat(item.price);
                });
                coffe_order = {
                    id: 0,
                    type: {id: 0,name: '', price: 0},
                    size: {
                        id: 0,
                        name: '',
                        price: ''
                    },
                    qty: 0,
                    sugar: 0,
                    coffee_type: {
                        id: 0,
                        name:0,
                        price: 0
                    },
                    price: 30
                };
                console.log(total,'total');
                console.log(all_orders,'total all araay');
                $('.total').text(total.toFixed(2));
            }
        });
    </script>
@endpush
