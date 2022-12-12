@extends('layouts.partials.mainlayout')
@section('body')
    <style>
        .table_d {
            background: rgba(206, 226, 238, 0.54);
            box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);
            border-radius: 10px;
        }

        td,
        th {
            border-style: none;
        }

        .table_2 {
            background: #FFFFFF;
            box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);
            border-radius: 10px;
        }

        .red {
            background: rgba(255, 122, 0, 0.16);
            box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);
            border-radius: 10px;
        }

        .blue {
            background: rgba(188, 189, 255, 0.25);
            box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);
            border-radius: 10px;
        }
        .btn-pdf {
            background-color: #4CAF50 !important;
            border: none !important;
            color: white !important;
            padding: 15px 32px !important;
            text-align: center !important;
            text-decoration: none !important;
            display: inline-block !important;
            font-size: 16px !important;
            float: right;
            margin-bottom: 10px;
        }
        .btn-pdf,a{
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="container">
        <div class="row">
            <div>
                <button type="button" class="btn-pdf"><a href="{{route('pdf_files').'/'.$invoices['id']}}">export pdf</a></button>
                </div>
        </div>
        <div class="row table_d p-4 ">
            <div class="col-12">
                <h4>Invoice</h4>
            </div>
            <div class="col-12 d-block d-sm-flex">
                <div class="col-12 col-sm-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Number</th>
                                <td>{{@$invoices['number']}}</td>
                            </tr>

                            <tr>
                                <th>Issued by</th>
                                <td>{{@$invoices['issued_by']}}</td>
                            </tr>

                            <tr>
                                <th>Branch</th>
                                <td>{{@$invoices['branch']}}</td>
                            </tr>

                            <tr>
                                <th>Created</th>
                                <td>{{@$invoices['created_by']}}</td>
                            </tr>

                            <tr>
                                <th>Payment team</th>
                                <td>{{@$invoices['payment_team']}}</td>
                            </tr>
                            <tr>
                                <th>Due date</th>
                                <td>{{@$invoices['amount_due']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-12 col-sm-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Customer</th>
                                <td>{{@$invoices['customer_user_id ']}}</td>
                            </tr>

                            <tr>
                                <th>Amount</th>
                                <td>{{@$invoices['total_amount']}}</td>
                            </tr>

                            <tr>
                                <th>Paid Amount</th>
                                <td>{{@$invoices['amount_paid']}}</td>
                            </tr>

                            <tr>
                                <th>Due Amount</th>
                                <td>{{@$invoices['amount_due']}}</td>
                            </tr>

                            <tr>
                                <th>Created by</th>
                                <td>{{@$invoices['created_by']}}</td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <td>{{@$invoices['	note']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row table_2 p-4 mt-5"  style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Services</th>
                        <th>Amount</th>
                        <th>VIN number</th>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Lot number</th>
                        <th>Reference number</th>
                        <th>Booking number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="red">
                        <td>Material</td>
                        <td>1234</td>
                        <td>nkk9878</td>
                        <td>2022</td>
                        <td>g-70</td>
                        <td>gh77</td>
                        <td>65321</td>
                        <td>5632</td>
                        <td>hh3567</td>
                    </tr>

                    <tr>
                        <td>Material</td>
                        <td>1234</td>
                        <td>nkk9878</td>
                        <td>2022</td>
                        <td>g-70</td>
                        <td>gh77</td>
                        <td>65321</td>
                        <td>5632</td>
                        <td>hh3567</td>
                    </tr>

                    <tr class="blue">
                        <td>Material</td>
                        <td>1234</td>
                        <td>nkk9878</td>
                        <td>2022</td>
                        <td>g-70</td>
                        <td>gh77</td>
                        <td>65321</td>
                        <td>5632</td>
                        <td>hh3567</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
@endsection