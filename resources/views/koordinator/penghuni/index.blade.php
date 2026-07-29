@extends('layouts.admin')

@section('content')

<div class="container">


    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>
            Data Penghuni
        </h3>


        <a href="{{ route('koordinator.penghuni.create') }}"
           class="btn btn-primary">

            + Tambah Penghuni

        </a>

    </div>



    {{-- Alert sukses --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    <div class="card shadow-sm">

        <div class="card-body">


            <table class="table table-bordered table-striped">


                <thead class="table-dark">

                    <tr>

                        <th width="5%">
                            No
                        </th>

                        <th>
                            Nama Penghuni
                        </th>

                        <th>
                            Kamar
                        </th>

                        <th width="20%">
                            Aksi
                        </th>

                    </tr>

                </thead>



                <tbody>


                @forelse($penghunis as $item)


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>



                        <td>
                            {{ $item->nama_penghuni }}
                        </td>



                        <td>
                            {{ $item->kamar ?? '-' }}
                        </td>



                        <td>


                            <a href="{{ route('koordinator.penghuni.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>




                            <form action="{{ route('koordinator.penghuni.destroy',$item->id) }}"
                                  method="POST"
                                  style="display:inline-block">


                                @csrf
                                @method('DELETE')


                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    Hapus

                                </button>


                            </form>


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Belum ada data penghuni

                        </td>

                    </tr>


                @endforelse



                </tbody>


            </table>


        </div>

    </div>


</div>

@endsection