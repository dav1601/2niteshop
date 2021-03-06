<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>
    <style>

        body {
            margin-top: 20px;
            font-family: DejaVu Sans !important;
        }

        /*Invoice*/
        .invoice .top-left {
            font-size: 65px;
            color: #3ba0ff;
        }

        .invoice__top--right {
            padding: 15px 78px !important;
        }

        .invoice .top-right {
            text-align: right;
            padding-right: 55px;
            margin-top: 20px;
        }

        .invoice .table-row {
            margin-left: -15px;
            margin-right: -15px;
            margin-top: 25px;
        }

        .invoice .payment-info {
            font-weight: 500;
        }

        .invoice .table-row .table>thead {
            border-top: 1px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom: none;
        }

        .invoice .table>tbody>tr>td {
            padding: 8px 20px;
        }

        .invoice .invoice-total {
            margin-right: -10px;
            font-size: 16px;
        }

        .invoice .last-row {
            border-bottom: 1px solid #ddd;
        }

        .invoice-ribbon {
            width: 85px;
            height: 88px;
            overflow: hidden;
            position: absolute;
            top: -1px;
            right: 14px;
        }

        .ribbon-inner {
            text-align: center;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            position: relative;
            padding: 7px 0;
            left: -5px;
            top: 11px;
            width: 120px;
            background-color: #66c591;
            font-size: 15px;
            color: #fff;
        }

        .ribbon-inner:before,
        .ribbon-inner:after {
            content: "";
            position: absolute;
        }

        .ribbon-inner:before {
            left: 0;
        }

        .ribbon-inner:after {
            right: 0;
        }

        @media(max-width:575px) {

            .invoice .top-left,
            .invoice .top-right,
            .invoice .payment-details {
                text-align: center;
            }

            .invoice .from,
            .invoice .to,
            .invoice .payment-details {
                float: none;
                width: 100%;
                text-align: center;
                margin-bottom: 25px;
            }

            .invoice p.lead,
            .invoice .from p.lead,
            .invoice .to p.lead,
            .invoice .payment-details p.lead {
                font-size: 22px;
            }

            .invoice .btn {
                margin-top: 10px;
            }
        }

        @media print {
            .invoice {
                width: 900px;
                height: 800px;
            }
        }
    </style>
    <div class="bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon">
                            <div class="ribbon-inner">PAID</div>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('client/images/email-logo.png') }}" alt="" width="100"
                                            height="auto">
                                    </td>
                                    <td class="top-right invoice__top--right" style="z-index: 1000;">
                                        <h3 class="marginright">INVOICE-{{ $ordered->id }} </h3>
                                        <span class="marginright">{{ $carbon->now() }}</span>
                                </tr>


                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="lead marginbottom">From : 2NITE SHOP</p>
                                        <p>151/60 Tr???n Ho??ng Na
                                        </p>
                                        <p>H??ng L???i,Ninh Ki???u</p>
                                        <p>C???n Th??</p>
                                        <p>Phone: 0858458469</p>
                                        <p>Email: vaone6v2@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="lead marginbottom">To : {{ $ordered->name }} </p>
                                        <p> {{ $ordered->address }} </p>
                                        <p> {{ $ordered->ward }}, {{ $ordered->dist }} </p>
                                        <p> {{ $ordered->prov }} </p>
                                        <p>Phone: {{ $ordered->phone }}</p>
                                        <p>Email: {{ $ordered->email }}</p>
                                    </td>
                                    <td>
                                        <p class="lead marginbottom payment-info">Payment details</p>
                                        <p>Date: {{$ordered->date_s}}</p>
                                        <p>VAT: DK888-777 </p>
                                        <p>Total Amount: {{ crf($ordered->total) }}</p>
                                        <p>Account Name: Flatter</p>
                                    </td>
                                </tr>


                            </tbody>
                        </table>


                        <div class="row table-row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:5%">#</th>
                                        <th style="width:50%">T??n s???n ph???m</th>
                                        <th class="text-right" style="width:15%">S??? l?????ng</th>
                                        <th class="text-right" style="width:15%">Gi??</th>
                                        <th class="text-right" style="width:15%">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 0;
                                    @endphp
                                    @foreach ($cart as $item )
                                    @php
                                    $index++;
                                    if ($item->options->ins != 0){
                                        $ins = App\Models\Insurance::where('id', '=' , $item->options->ins)->first();
                                        $price = crf($ins->price);
                                    }
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $index }}</td>
                                        <td> {{ $item->name }} @if ($item->options->ins != 0) ({{ App\Models\bundled_product::where('id', '=' , $ins->group)->first()->name }} : {{ $ins->name }}(+ {{ $price }})  ) @endif </td>
                                        <td class="text-right"> {{ $item->qty }} </td>
                                        <td class="text-right"> {{ crf($item->price) }} </td>
                                        <td class="text-right"> {{ crf($item->options->sub_total) }} </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>


                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong class="marginbottom d-block"
                                            style="margin-left:120px; font-size:20px;">Signature Shop:</strong>
                                        <img src="{{ asset('client/images/signature.png') }}" alt="signature"
                                            width="400">
                                    </td>
                                    <td class="top-right" style="z-index: 1000;">
                                        <p style="font-size: 20px;">Total : <strong>{{ crf($ordered->total) }}</strong> </p>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
