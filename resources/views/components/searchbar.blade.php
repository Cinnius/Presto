<div class="container">
    <div class="row">
        <div class="col-3">
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
