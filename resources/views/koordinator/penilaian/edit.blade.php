@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h4>
                Edit Penilaian {{ $penilaian->penghuni->nama_penghuni }}
            </h4>
        </div>


        <div class="card-body">


            @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                    @endforeach

                </ul>

            </div>

            @endif



            <div class="mb-3">

                <label>
                    Nama Penghuni
                </label>

                <input type="text"
                       class="form-control"
                       value="{{ $penilaian->penghuni->nama_penghuni }}"
                       readonly>

            </div>



            <div class="mb-3">

                <label>
                    Kamar
                </label>

                <input type="text"
                       class="form-control"
                       value="{{ $penilaian->penghuni->kamar }}"
                       readonly>

            </div>



            <form action="{{ route('koordinator.penilaian.update',$penilaian->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="mb-3">

                    <label>
                        Nilai
                    </label>

                    <input type="number"
                           name="poin"
                           class="form-control"
                           min="0"
                           max="100"
                           value="{{ $penilaian->poin }}"
                           required>

                </div>



                <div class="mb-3">

                    <label>
                        Penghargaan
                    </label>


                    <select name="kategori"
                            class="form-control"
                            required>


                        <option value="🏆 Best Crew"
                        {{ $penilaian->kategori == '🏆 Best Crew' ? 'selected':'' }}>
                            🏆 Best Crew
                        </option>


                        <option value="🌟 Penghuni Teladan"
                        {{ $penilaian->kategori == '🌟 Penghuni Teladan' ? 'selected':'' }}>
                            🌟 Penghuni Teladan
                        </option>


                        <option value="🧹 Rajin Piket"
                        {{ $penilaian->kategori == '🧹 Rajin Piket' ? 'selected':'' }}>
                            🧹 Rajin Piket
                        </option>


                        <option value="⭐ Good Performance"
                        {{ $penilaian->kategori == '⭐ Good Performance' ? 'selected':'' }}>
                            ⭐ Good Performance
                        </option>


                        <option value="💪 Semangat Piket"
                        {{ $penilaian->kategori == '💪 Semangat Piket' ? 'selected':'' }}>
                            💪 Semangat Piket
                        </option>


                    </select>


                </div>



                <button class="btn btn-success">
                    Update Penilaian
                </button>


                <a href="{{ route('koordinator.penilaian.show',$penilaian->id) }}"
                   class="btn btn-secondary">

                    Kembali

                </a>


            </form>


        </div>

    </div>

</div>


@endsection