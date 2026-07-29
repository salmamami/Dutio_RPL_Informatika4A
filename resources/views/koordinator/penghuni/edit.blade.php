@extends('layouts.admin')

@section('content')

<div class="container">

    <h3 class="mb-4">Edit Penghuni</h3>


    <form action="{{ route('koordinator.penghuni.update', $penghuni->id) }}" 
          method="POST">

        @csrf
        @method('PUT')



        <div class="mb-3">

            <label class="form-label">
                Penghuni
            </label>


            <select name="user_id"
                    id="user_id"
                    class="form-control"
                    required>


                @foreach($users as $user)

                    <option value="{{ $user->id }}"
                            data-kamar="{{ $user->kamar }}"
                            {{ $penghuni->user_id == $user->id ? 'selected' : '' }}>

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
                   class="form-control"
                   value="{{ $penghuni->nama_penghuni }}"
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
                   value="{{ $penghuni->kamar }}"
                   readonly>

        </div>




        <button type="submit"
                class="btn btn-primary">

            Update

        </button>


        <a href="{{ route('koordinator.penghuni.index') }}" 
           class="btn btn-secondary">

            Kembali

        </a>


    </form>


</div>



<script>

function updateKamar(){

    let select = document.getElementById('user_id');

    let kamar = select.options[select.selectedIndex]
                    .getAttribute('data-kamar');


    document.getElementById('kamar').value = kamar ?? '';

}


document.getElementById('user_id')
.addEventListener('change', function(){

    updateKamar();

});


// jalankan otomatis saat halaman edit dibuka
updateKamar();


</script>


@endsection