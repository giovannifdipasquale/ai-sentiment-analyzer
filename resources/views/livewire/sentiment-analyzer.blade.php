<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Sentiment Analyzer</h2>
            <div class="mb-3">
                <textarea id="inputText" class="form-control" rows="3" placeholder="Enter text here..."
                    wire:model="input"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-dark" wire:click="analyzeSentiment">
                    <i class="bi bi-thermometer me-2"></i> Analyze Sentiment
                </button>
            </div>
            @if ($sentiment)
            <div class="mt-4 text-center">
                <p class="fs-4">Sentiment: {!! $sentiment !!}</p>
            </div>
            @endif
        </div>
    </div>
</div>