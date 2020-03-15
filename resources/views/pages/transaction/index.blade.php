@extends('layouts.default')


@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                
                <div class="card-body">
                    <h4 class="box-title">Daftar Transaction</h4>
                </div>

                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No.HP</th>
                                    <th>Total Transakasi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>Rp{{ $item->total }}</td>
                                    <td>
                                        @if($item->status == 'PENDING')
                                            <span class="badge badge-info">
                                        @elseif($item->status == 'SUCCESS')
                                            <span class="badge badge-success">
                                        @elseif($item->status == 'FAILED')
                                            <span class="badge badge-danger">
                                        @else
                                            <span>
                                        @endif
                                        {{$item->status}}
                                            </span>
                                    </td>
                                    <td>
                                        @if($item->status == 'PENDING')
                                        <a href="{{ route('transaction.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                        </a>

                                        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        @endif
                                        
                                        <!-- <a href="#mymodal"
                                            data-remote="{{ route('transaction.show', $item->id) }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Detail Transaksi {{ $item->name }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a> -->

                                        <a href="{{route('transaction.edit',$item->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <form action="{{route('transaction.destroy',$item->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">Data Null</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>

@endsection