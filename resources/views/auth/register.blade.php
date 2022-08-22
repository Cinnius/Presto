<x-layout>

        <div class="container">
                <div class="row">
                        <div class="col-12">
                                <form action="{{route('register')}}" method="POST">
                                        @csrf
                                <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">name</label>
                                        <input type="text" name="name" class="form-control" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">password</label>
                                        <input type="password" name="password" class="form-control" >
                                </div>
                                <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">conferma password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Registrati!</button>
                        </form>
        
                        </div>
                </div>
        </div> 
        
        </x-layout>