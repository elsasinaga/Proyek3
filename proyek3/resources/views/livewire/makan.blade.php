<div>
    <h2>Detail Module LKPD</h2>
    <ul>
        <li><strong>Title:</strong> {{ $moduleLkpd->lkpd_title }}</li>
        <li><strong>Description:</strong> {{ $moduleLkpd->lkpd_description }}</li>
        <li><strong>User:</strong> {{ $moduleLkpd->user->name ?? 'Unknown' }}</li>
        <li><strong>Category:</strong> {{ $moduleLkpd->category->category_name ?? 'Uncategorized' }}</li>
        <li><strong>Material Name:</strong> {{ $moduleLkpd->material_name }}</li>
        <li><strong>Material Image:</strong> 
            @if ($moduleLkpd->material_image)
                <img src="{{ asset('storage/' . $moduleLkpd->material_image) }}" alt="Material Image" width="100">
            @else
                None
            @endif
        </li>
        <li><strong>Class:</strong> {{ $moduleLkpd->Kelas }}</li>
        <li><strong>Level:</strong> {{ $moduleLkpd->Jenjang }}</li>
    </ul>

    <h3>Tags</h3>
    @if ($moduleLkpd && $moduleLkpd->tags->count() > 0)
        <ul>
            @foreach ($moduleLkpd->tags as $tag)
                <li>{{ $tag->tag_name }}</li>
            @endforeach
        </ul>
    @else
        <p>No tags found for this module.</p>
    @endif
</div>
