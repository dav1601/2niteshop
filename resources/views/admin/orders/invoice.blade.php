<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                        <table class="table-borderless table">
                            <tbody>
                                <tr>

                                    <td class="top-right invoice__top--right" style="z-index: 1000;">
                                        <h3 class="marginright">INVOICE-{{ $ordered->code }} </h3>
                                        <span class="marginright">{{ $carbon->now() }}</span>
                                </tr>


                            </tbody>
                        </table>
                        <hr>
                        <table class="table-borderless table">
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="lead marginbottom">From : 2NITE SHOP</p>
                                        <p>151/60 Trần Hoàng Na
                                        </p>
                                        <p>Hưng Lợi,Ninh Kiều</p>
                                        <p>Cần Thơ</p>
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
                                        <p>Date: {{ $ordered->date_s }}</p>
                                        <p>VAT: DK888-777 </p>
                                        <p>Total Amount: {{ crf($ordered->total) }}</p>
                                        <p>Account Name: Flatter</p>
                                    </td>
                                </tr>


                            </tbody>
                        </table>


                        <div class="row table-row">
                            <table class="table-striped table">
                                <thead>
                                    <tr>

                                        <th style="width:50%">Tên sản phẩm</th>
                                        <th style="width:50%">Options đi kèm</th>
                                        <th class="text-right">Số lượng</th>
                                        <th class="text-right">Giá</th>
                                        <th class="text-right">Tổng phụ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cart as $product)
                                        <tr>

                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            {{-- <td>
                                                @if ($product->options->ins)
                                                    @php
                                                        $arrIns = explode(',', $product->options->ins);
                                                    @endphp

                                                    @foreach ($arrIns as $insid)
                                                        @php
                                                            $ins = App\Models\Insurance::where('id', $insid)->first();
                                                        @endphp
                                                        @if ($ins)
                                                            <span>
                                                                {{ App\Models\bundled_product::where('id', $ins->group)->first()->name }}:
                                                                {{ $ins->name }}(+ {{ crf($ins->price) }})
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <span>Không có</span>
                                                @endif

                                            </td> --}}
                                            <td class="text-right">x{{ $product->qty }}
                                            </td>
                                            <td class="text-right"> {{ crf($product->price) }}
                                            </td>
                                            <td class="text-right">
                                                {{ crf($product->options->sub_total) }} </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <table class="table-borderless table">
                            <tbody>
                                <tr>

                                    <td class="top-right" style="z-index: 1000;">
                                        <p style="font-size: 20px;">Total : <strong>{{ crf($ordered->total) }}</strong>
                                        </p>
                                    </td>
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
