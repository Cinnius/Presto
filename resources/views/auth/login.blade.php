<x-layout>

<div class="container">
        <div class="row">
                <div class="col-12">
                        <form action="{{route('login')}}" method="POST">
                                @csrf
                        <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" >
                        </div>
                        
                        <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" >
                        </div>
                        <div>
                                <input type="checkbox" name="remember" class="form-check-input">
                                <label class="form-check-label">ricordami</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Accedi</button>
                </form>

                </div>
        </div>
</div> 

</x-layout>
