@extends('layouts.app')

@section('breadcrumb')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Clinic</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage medicine sales</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    @include('layouts.components.alert')
                    <h5 class="mb-10">Manage Medicine Sales</h5>
                    <p class="mb-25">Use <code>table-responsive{-sm|-md|-lg|-xl}</code> as needed to create responsive tables up to a particular breakpoint.</p>
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin::medicine::sale::create') }}" class="btn btn-gradient-primary mb-3">Add Medicine Sale</a>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive-md">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Patient</th>
                                                <th>Medicines</th>
                                                <th>Total Price</th>
                                                <th>Total quantity</th>
                                                <th>Notes</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse()
                                            <tr>
                                                <td>{{ $sale->sale_number }}</td>
                                                <td>{{ $sale->patient->name }}</td>
                                                <td>
                                                    @forelse($sale->medicines as $medicine)
                                                        {{ $medicine->name }},
                                                    @empty
                                                        No medicines
                                                    @endforelse
                                                </td>
                                                <td>{{ $sale->price }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>{{ $sale->notes }}</td>
                                                <td>
                                                    <a href="{{ route('admin::medicine::sale::edit', ['sale' => 1]) }}" class="btn btn-info btn-sm mr-25">Edit</a>
                                                    <form action="" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm mr-25">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td>No medicine sales found..</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
