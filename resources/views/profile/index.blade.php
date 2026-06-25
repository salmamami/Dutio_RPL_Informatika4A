@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2>Profil Saya</h2>
    <p class="text-muted">
        Informasi akun penghuni asrama
    </p>
</div>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body text-center">

                <img
                    src="https://ui-avatars.com/api/?name=Ami"
                    class="rounded-circle mb-3"
                    width="120">

                <h4>Salma Amirah Balqis</h4>

                <p class="text-muted">
                    Penghuni Asrama
                </p>

            </div>

        </div>

        <div class="card mt-3">

            <div class="card-body">

                <table class="table table-borderless">

                    <tr>
                        <th width="200">
                            Nama
                        </th>

                        <td>
                            Salma Amirah Balqis
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Email
                        </th>

                        <td>
                            ami@email.com
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Nomor Kamar
                        </th>

                        <td>
                            A-12
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Crew Points
                        </th>

                        <td>
                            120 Poin
                        </td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="mt-3">

            <button class="btn btn-primary">
                Edit Profil
            </button>

            <button class="btn btn-danger">
                Logout
            </button>

        </div>

    </div>

</div>

@endsection