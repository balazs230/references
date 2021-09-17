@extends('layouts/admin')


@section('content')   
    
<div class="row">

    <div class="col-lg-12">
        <h4 class="border border-top-0 border-left-0 border-right-0">Statisticile zilei curente</h4>
        <br />
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $today_books }}</dt>
                            <dd>Total Carti Vandute</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $today_orders }}</dt>
                            <dd>Total Comenzi</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $today_income }}</dt>
                            <dd>Total Incasari</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        <h4 class="border border-top-0 border-left-0 border-right-0">Situatie vanzari/incasari</h4>
        <br />
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $total_books }}</dt>
                            <dd>Total Carti Vandute</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $orders }}</dt>
                            <dd>Total Comenzi</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $total_income }}</dt>
                            <dd>Total Incasari</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        <h4 class="border border-top-0 border-left-0 border-right-0">Alte detalii</h4>
        <br />
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $books }}</dt>
                            <dd>Total Carti</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $books_with_discount }}</dt>
                            <dd>Carti cu Discount</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-dark shadow-sm">
                    <div class="card-body">
                        <dl style="margin: 0px;">
                            <dt>{{ $users }}</dt>
                            <dd>Utilizatori</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection