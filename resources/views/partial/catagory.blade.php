<section class="category">
    <h1 class="heading">job categories</h1>

    <div class="box-container">
        @foreach($categories as $category)
        <a href="{{route('category.index', [$category->id])}}" class="box">
            <i class="fas fa-code"></i>
            <div>
                <h3>{{$category->name}}</h3>
                <span>{{$category->jobs->count()}}</span>
            </div>
        </a>
        @endforeach
    </div>
</section>
