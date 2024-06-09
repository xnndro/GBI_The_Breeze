@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number"
                                class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select id="status" class="form-select @error('status') is-invalid @enderror"
                                    name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>
                                    <option value="">Select One</option>
                                    <option value="Visitor">Visitor</option>
                                    <option value="Member">Member</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob"
                                class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation"
                                class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text"
                                    class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                    value="{{ old('occupation') }}" required autocomplete="occupation" autofocus>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="domicile" class="col-md-4 col-form-label text-md-end">{{ __('Domicile') }}</label>

                            <div class="col-md-6">
                                <input id="domicile" type="text"
                                    class="form-control @error('domicile') is-invalid @enderror" name="domicile"
                                    value="{{ old('domicile') }}" required autocomplete="domicile" autofocus>

                                @error('domicile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cell_group"
                                class="col-md-4 col-form-label text-md-end">{{ __('Cell Group') }}</label>

                            <div class="col-md-6">
                                <select id="cell_group" class="form-select @error('cell_group') is-invalid @enderror"
                                    name="cell_group" value="{{ old('cell_group') }}" required autocomplete="cell_group"
                                    autofocus>
                                    <option value="">Select One</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @error('cell_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="know_us_from"
                                class="col-md-4 col-form-label text-md-end">{{ __('Know Us From') }}</label>

                            <div class="col-md-6">
                                <select id="know_us_from" class="form-select @error('know_us_from') is-invalid @enderror"
                                    name="know_us_from" value="{{ old('know_us_from') }}" required
                                    autocomplete="know_us_from" autofocus>
                                    <option value="">Select One</option>
                                    <option value="Family">Family</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Others">Others</option>
                                </select>

                                @error('know_us_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="is_admin"
                                class="col-md-4 col-form-label text-md-end">{{ __('Is Admin') }}</label>

                            <div class="col-md-6">
                                <select id="is_admin" class="form-select @error('is_admin') is-invalid @enderror"
                                    name="is_admin" value="{{ old('is_admin') }}" required autocomplete="is_admin"
                                    autofocus>
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>

                                @error('is_admin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-dark">Batalkan</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
