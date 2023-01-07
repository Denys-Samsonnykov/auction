
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Title: {{ $lot->title }}</h5>
        <br><br>
        <h6 class="card-subtitle mb-2 text-muted">Category: {{ $lot->category->title }}</h6>
        <p class="card-text">{{ $lot->description }}</p>
        <a href="{{ route('lots.edit', $lot) }}"
           class="btn btn-sm btn-outline-dark">
            Edit
        </a>
        <form action="{{ route('lots.delete', $lot) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger form-control" value="Delete">
        </form>
    </div>
</div>
