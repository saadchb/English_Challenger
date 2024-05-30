<!-- resources/views/livewire/blog-list.blade.php -->

<div>
    @foreach ($blogs as $blog)
        <!-- Display blog post -->
    @endforeach

    @if ($blogs->hasPages())
        <div wire:click="loadMore" wire:loading.remove>
            <button class="btn btn-primary">Show More</button>
        </div>
        <div wire:loading>
            Loading...
        </div>
    @endif
</div>
