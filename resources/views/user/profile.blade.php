@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card">
            <div class="card-header">Profile</div>

            <div class="card-body">
                <form method="POST" action=" {{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf


                        <div class="form-group col">
                        <label for="name">Name :</label>
                        <div class="col-md-6">


                            <input type="text" name="name" autofocus required value="{{ $user->name }}"
                                class="col-md form-control">
                        </div>

                        <label for="email">Email:</label>
                        <div class="col-md-6">


                            <input type="email" name="email" autofocus required value="{{ $user->email }}"
                                class="  col-md form-control">
                        </div>

                        <label for="about">About:</label>
                        <div class="col-md-6">


                            <textarea name="about" class="form-control" cols="2" rows="3"
                                placeholder="Tell us about ur self">{{ $profile->about }}</textarea>
                        </div>
                        <label for="facebook">Facebook :</label>
                        <div class="col-md-6">


                            <input type="text" name="facebook" autofocus required value="{{ $profile->facebook }}"
                                class=" form-control">
                        </div>
                        <label for="twitter">Twitter :</label>
                        <div class="col-md-6">


                            <input type="text" name="twitter" autofocus required value="{{ $profile->twitter }}"
                                class=" form-control">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success ">Update</button>
                        </div>
                    </div>
                    @include('layouts.errors')
                </form>

            </div>
        </div>

    </div>
@endsection
