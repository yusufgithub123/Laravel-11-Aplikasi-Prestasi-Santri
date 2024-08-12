@extends('layouts.layout')

@section('content')
    <section style="margin-top: 100px">
        <div class="container py-5 col-md-4">
            <!-- Box Container -->
            <div class="bg-white shadow rounded p-3 border border-light">
                <h3 class="fw-bold mb-5 text-center">Login Admin Pesantren</h3>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Masukan Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Masukan Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </section>
@endsection
