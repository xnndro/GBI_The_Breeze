@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus>

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
                               <!-- check where the selected -->
                                <select id="status" class="form-select @error('status') is-invalid @enderror" name="status" value="{{ $user->status }}" required autocomplete="status" autofocus>
                                    <option value="Visitor" {{ $user->status == 'Visitor' ? 'selected' : '' }}>Visitor</option>
                                    <option value="Member" {{ $user->status == 'Member' ? 'selected' : '' }}>Member</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user->dob }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <!-- for ocupation -->
                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $user->occupation }}" required autocomplete="occupation" autofocus>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- for domicile -->
                        <div class="row mb-3">
                            <label for="domicile" class="col-md-4 col-form-label text-md-end">{{ __('Domicile') }}</label>

                            <div class="col-md-6">
                                <input id="domicile" type="text" class="form-control @error('domicile') is-invalid @enderror" name="domicile" value="{{ $user->domicile }}" required autocomplete="domicile" autofocus>

                                @error('domicile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- for cell group -->
                        <div class="row mb-3">
                            <label for="cell_group" class="col-md-4 col-form-label text-md-end">{{ __('Cell Group') }}</label>

                            <div class="col-md-6">
                                <select id="cell_group" class="form-select @error('cell_group') is-invalid @enderror" name="cell_group" value="{{ $user->cell_group }}" required autocomplete="cell_group" autofocus>
                                    <option value="1" {{ $user->cell_group == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $user->cell_group == 0 ? 'selected' : '' }}>No</option>
                                </select>

                                @error('cell_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- for know us from, drop down with value 'Family', 'Social Media', 'Friend', 'Others' and if others so show 1 colomn for insert the value -->
                        <div class="row mb-3">
                            <label for="know_us_from" class="col-md-4 col-form-label text-md-end">{{ __('Know Us From') }}</label>

                            <div class="col-md-6">
                                <select id="know_us_from" class="form-select @error('know_us_from') is-invalid @enderror" name="know_us_from" value="{{ $user->know_us_from }}" required autocomplete="know_us_from" autofocus>
                                    <option value="Family" {{ $user->know_us_from == 'Family' ? 'selected' : '' }}>Family</option>
                                    <option value="Social Media" {{ $user->know_us_from == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                    <option value="Friend" {{ $user->know_us_from == 'Friend' ? 'selected' : '' }}>Friend</option>
                                    <option value="Others" {{ $user->know_us_from == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>

                                @error('know_us_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- for is admin -->
                        <div class="row mb-3">
                            <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('Is Admin') }}</label>

                            <div class="col-md-6">
                                <select id="is_admin" class="form-select @error('is_admin') is-invalid @enderror" name="is_admin" value="{{ $user->is_admin }}" required autocomplete="is_admin" autofocus>
                                    <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>No</option>
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
                                    {{ __('Update') }}
                                </button>
                                <a href="{{route('home')}}" class="btn btn-dark">Batalkan</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
