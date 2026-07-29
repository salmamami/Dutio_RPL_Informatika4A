@extends('layouts.admin')

@section('content')

<div class="container">

    <h3 class="mb-4">
        Tambah Penghuni
    </h3>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <form action="{{ route('koordinator.penghuni.store') }}"
          method="POST">

        @csrf



        <div class="mb-3">

            <label class="form-label">
                Pilih Penghuni
            </label>


            <select name="user_id"
                    id="user_id"
                    class="form-control"
                    required>


                <option value="">
                    -- Pilih Penghuni --
                </option>


                @foreach($users as $user)

                    <option value="{{ $user->id }}"
                            data-kamar="{{ $user->kamar }}">

                        {{ $user->kamar }} - {{ $user->name }}

                    </option>

                @endforeach


            </select>

        </div>




        <div class="mb-3">

            <label class="form-label">
                Nama Penghuni
            </label>


            <input type="text"
                   name="nama_penghuni"
                   id="nama_penghuni"
                   class="form-control"
                   placeholder="Masukkan nama penghuni"
                   required>

        </div>




        <div class="mb-3">

            <label class="form-label">
                Kamar
            </label>


            <input type="text"
                   name="kamar"
                   id="kamar"
                   class="form-control"
                   readonly
                   placeholder="Kamar otomatis">

        </div>




        <button type="submit"
                class="btn btn-success">

            Simpan

        </button>


        <a href="{{ route('koordinator.penghuni.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>



    </form>


</div>



<script>

document.getElementById('user_id')
.addEventListener('change', function(){


    let selected = this.options[this.selectedIndex];


    let kamar = selected.getAttribute('data-kamar');


    document.getElementById('kamar').value = kamar ?? '';


});

</script>


@endsection